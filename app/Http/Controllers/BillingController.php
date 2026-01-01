<?php

namespace App\Http\Controllers;

use App\Models\employer;
use App\Models\billing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = billing::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
            // Search in billing table
            $q->where('control_number', 'like', "%{$search}%")
        
            // Search in employer name or PEN
            ->orWhereHas('employer', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('PEN', 'like', "%{$search}%");
                });
            });
        }

        $query->orderBy('control_number', 'asc');

         $billings = $query->paginate(10)->withQueryString();

         // ➕ Add this loop to tag if overdue
        foreach ($billings as $billing) {
            $billing->is_overdue = Carbon::parse($billing->status_date)->diffInDays(now()) >= 15;
        }

        return view('billing.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employers = employer::all();
        return view('billing.create', compact('employers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'employer_id' => 'required|exists:employers,id',
            'amount' => 'required|decimal:2',
            'applicable_period' => 'required|string',
            'no_of_months' => 'required|integer',
            'premium' => 'required|decimal:2',
            'interest' => 'required|decimal:2',
            'type' => 'required|string',
            'control_number' => 'required|string',
            'status' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf',
            'latest' => 'required|string',
            'status_date' => 'required|date',
            'remarks' => 'required|string'
        ]);

        $data = $request->except('file_path');

        // Handle the file upload
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('billing_documents', 'public');
            $data['file_path'] = $path;
        }

        billing::create($data);

        return redirect()->route('billing.index')->with('success', 'Billing is successfully added in the database');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(billing $billing)
    {
        //
        $employers = employer::all();
        return view('billing.edit', compact('billing', 'employers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, billing $billing)
    {
        //
        $validated = $request->validate([
            'employer_id' => 'required|exists:employers,id',
            'amount' => 'required|decimal:2',
            'applicable_period' => 'required|string',
            'no_of_months' => 'required|integer',
            'premium' => 'required|decimal:2',
            'interest' => 'required|decimal:2',
            'type' => 'required|string',
            'control_number' => 'required|string',
            'status' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf',
            'latest' => 'required|string',
            'status_date' => 'required|date',
            'remarks' => 'required|string'
        ]);

        // If there's a new file, delete the old one and save the new one
        if ($request->hasFile('file_path')) {
            // Delete old file if it exists
            if ($billing->file_path && Storage::disk('public')->exists($billing->file_path)) {
                Storage::disk('public')->delete($billing->file_path);
            }

            // Store the new file
            $newPath = $request->file('file_path')->store('billing_files', 'public');
            $validated['file_path'] = $newPath;
        }

         // Update the billing record with validated + new file path (if any)
        $billing->update($validated);

        return redirect()->route('billing.index')->with('success', 'Billing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(billing $billing)
    {
        //
        $billing->delete();
        return redirect()->route('billing.index')->with('success', 'Billing is successfully deleted.');
    }
}
