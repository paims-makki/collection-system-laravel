<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\billing;
use App\Models\employer;

class dashboardController extends Controller
{
    //
    public function index(){
        $totalEmployers = employer::count();
        $totalBillings = billing::count();
        $issuedBillings = billing::where('status', 'Issued')->count();
        $overdueBillings = billing::whereDate('status_date', '<=', now()->subDays(15))
            ->where('status', 'Issued')->get();
        $generatedBillings = billing::where('status', 'Generated')->count();

        $employerTypes = \App\Models\employer::selectRaw('classification, COUNT(*) as total')
            ->groupBy('classification')
            ->get();
        
        $typeLabels = $employerTypes->pluck('classification');
        $typeCounts = $employerTypes->pluck('total');

        return view('dashboard', compact(
            'totalEmployers', 'totalBillings', 'issuedBillings', 'overdueBillings', 'generatedBillings', 'typeLabels', 'typeCounts'
        ));
    }
}
