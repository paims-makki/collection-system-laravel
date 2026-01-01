<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\billing;
use App\Models\employer;
use App\Models\ams;

class dashboardController extends Controller
{
    //
    public function index(){
        $totalEmployers = employer::count();
        $totalBillings = billing::count();
        $issuedBillings = billing::where('status', 'Issued')->get();
        $totalIssuedBillings = billing::where('status', 'Issued')->count();
        $overdueBillings = billing::whereDate('status_date', '<=', now()->subDays(15))
            ->where('status', 'Issued')->get();
        $totalOverdueBillings = billing::whereDate('status_date', '<=', now()->subDays(15))
            ->where('status', 'Issued')->count();
        $totalGeneratedBillings = billing::where('status', 'Generated')->count();
        $generatedBillings = billing::where('status', 'Generated')->get();
        $totalCaseFolderBillings = billing::where('status', 'Case-Folder')->count();
        $caseFolderBillings = billing::where('status', 'Case-Folder')->get();
        $totalSettledBillings = billing::where('status', 'Settled')->count();
        $settledBillings = billing::where('status', 'Settled')->get();

        $billingStatus = \App\Models\billing::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        $statusLabels = $billingStatus->pluck('status');
        $statusCounts = $billingStatus->pluck('total');

        $employerTypes = \App\Models\employer::selectRaw('classification, COUNT(*) as total')
            ->groupBy('classification')
            ->get();
        
        $typeLabels = $employerTypes->pluck('classification');
        $typeCounts = $employerTypes->pluck('total');

        // this gets the latest reporting_month
        $latestImportedData = ams::orderBy('created_at', 'desc')
            ->value('reporting_month');
        
        $totalRemitting = ams::where('reporting_month', $latestImportedData)
            ->where('status', 'Remitting')
            ->count();
        
        $totalAccountLoad = ams::where('reporting_month', $latestImportedData)
            ->count();

        $totalDelinquent = ams::where('reporting_month', $latestImportedData)
            ->where('status', 'Delinquent')
            ->count();

        $totalNonRemitting = ams::where('reporting_month', $latestImportedData)
            ->where('status', 'Non-remitting')
            ->count();
            
        $loadStatus = \App\Models\ams::selectRaw('status, COUNT(*) as total')
            ->where('reporting_month', $latestImportedData)
            ->groupBy('status')
            ->get();


        $loadLabels = $loadStatus->pluck('status');
        $loadCounts = $loadStatus->pluck('total');

        return view('dashboard', compact(
            'totalEmployers', 'totalBillings', 'issuedBillings', 'overdueBillings', 'generatedBillings', 'typeLabels', 'typeCounts', 'totalOverdueBillings', 'totalIssuedBillings', 'totalGeneratedBillings', 'totalCaseFolderBillings', 'caseFolderBillings', 'totalSettledBillings', 'settledBillings', 'statusLabels', 'statusCounts', 'latestImportedData', 'totalRemitting', 'totalAccountLoad', 'totalDelinquent', 'totalNonRemitting', 'loadLabels', 'loadCounts'
        ));
    }
}
