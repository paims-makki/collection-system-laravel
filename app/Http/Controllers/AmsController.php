<?php

namespace App\Http\Controllers;

use App\Models\ams;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AmsImport;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class AmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ams::query();

        if($request->has('search')){
            $query->where(function($q) use ($request){
                $q->where('employer_name', 'like', '%' . $request->search . '%')
                  ->orwhere('pen', 'like', '%' . $request->search . '%')
                  ->orwhere('status', 'like', '%' . $request->search . '%');
            });
        }

        //this code that checks the date of entry
        if($request->filled('date')){
            $query->where('reporting_month', $request->date);
        }

        $records = $query->paginate(10);

        return view('ams.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //Custom method
    public function import(Request $request){
        $request->validate([
            'excel_file' => 'required|mimes:xlsx, xls, csv'
        ]);

        Excel::import(new AmsImport, $request->file('excel_file'));

        return redirect()
            ->route('ams.index');

    }
}
