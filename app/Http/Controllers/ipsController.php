<?php

namespace App\Http\Controllers;

use App\Models\ipsTask;
use App\Models\employer;
use Carbon\carbon;

use Illuminate\Http\Request;

class ipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ipsTask::query()->with(['employer']);
        
        if($request->has('search')) {
            $search = $request->input('search');

            $query->where(function($q) use ($search){
                $q->where('status', 'like', '%'.  $search . '%')
                    ->orWhere('perspective', 'like', '%'. $search . '%')
                    ->orWhere('responsible_unit', 'like', '%'. $search . '%')
                    ->orWhere('requestor', 'like', '%'. $search . '%')
                    
                    //search in employer table
                    ->orWhereHas('employer', function($sub) use ($search){
                        $sub->where('name', 'like', "&{$search}&" )
                            ->orWhere('PEN', 'like', "%{$search}%");
                    });
            });
        }

        if($request->filled('from_date') && $request->filled('to_date')){
            $from = Carbon::parse($request->from_date)->startOfDay();
            $to   = Carbon::parse($request->to_date)->endOfDay();
    
            $query->whereBetween('status_date', [$from, $to]);
        }

        $query->orderBy('created_at', 'desc');

        $tasks = $query->paginate(5)->withQueryString();

        return view('ips.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employers = Employer::orderBy('name', 'asc')->get();

        return view('ips.create', compact('employers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_date'       => 'required|date',
            'perspective'       => 'required|string',
            'responsible_unit'  => 'required|string',
            'specific_task'     => 'required|string',
            'requestor'         => 'required|string',
            'target_output'     => 'nullable|string',
            'actual_output'     => 'nullable|string',
            'status'            => 'required|string',
            'remarks'           => 'nullable|string',
            'editor'            => 'required|string',
            'employer_id'       => 'required|exists:employers,id',
        ]);

        ipsTask::createWithControlNumber($validated);

        return redirect()
            ->route('ips.index')
            ->with('success', 'IPS Task created successfully.');
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
    public function edit(ipsTask $ip)
    {
        $employers = Employer::orderBy('name', 'asc')->get();
        return view('ips.update', compact('employers', 'ip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ipsTask $ip)
    {
        $validated = $request->validate([
            'status_date'       => 'required|date',
            'perspective'       => 'required|string',
            'responsible_unit'  => 'required|string',
            'specific_task'     => 'required|string',
            'requestor'         => 'required|string',
            'target_output'     => 'nullable|string',
            'actual_output'     => 'nullable|string',
            'status'            => 'required|string',
            'remarks'           => 'nullable|string',
            'editor'            => 'required|string',
            'employer_id'       => 'required|exists:employers,id',
        ]);

        if ($validated['status'] === 'Completed') {

            $statusDate = Carbon::parse($validated['status_date']);
            $today      = Carbon::now();

            // difference in days (always positive)
            $validated['TAT'] = $statusDate->diffInDays($today);

            // OPTIONAL: if you want negative values when completed early
            // $validated['TAT'] = $today->diffInDays($statusDate, false);
        }

        // Save updates
        $ip->update($validated);

        return redirect()
        ->route('ips.index')
        ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ipsTask $ip)
    {
         $ip->delete();

        return redirect()->route('ips.index')->with('success', 'IPS Task deleted.');
    }
}
