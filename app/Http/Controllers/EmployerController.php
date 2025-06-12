<?php

namespace App\Http\Controllers;

use App\Models\employer;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = employer::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $employers = $query->get();

        return view('employer.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employer = employer::all();
        return view('employer.create', compact('employer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'PEN' => 'required|string|unique:employers',
            'address' => 'required|string',
            'no_of_employees' => 'required|integer',
            'name_of_head' => 'required|string',
            'type' => 'required|string',
            'classification' => 'required|string',
            'latest' => 'required|string'
        ]);

        employer::create($request->all());

        return redirect()->route('employer.index')->with('success', 'Employer is successfully added in the database');
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
    public function edit(employer $employer)
    {
        //
        return view('employer.update', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employer $employer)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'PEN' => 'required|string|unique:employers,PEN, ' . $employer->id,
            'address' => 'required|string',
            'no_of_employees' => 'required|integer',
            'name_of_head' => 'required|string',
            'type' => 'required|string',
            'classification' => 'required|string',
            'latest' => 'required|string'
        ]);

        $employer->update($request->all());

        return redirect()->route('employer.index')->with('success', 'Employer is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employer $employer)
    {
        //
        $employer->delete();
        return redirect()->route('employer.index')->with('success', 'Employer is successfully deleted.');
    }
}
