<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\billing;
use App\Models\employer;
use App\Models\ams;
use App\Models\ipsTask;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    //
    public function index(){
        $totalEmployers = employer::whereHas('billing')->count();
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

        //this the load perspectives
        $perspectives = DB::table('ips_tasks')
        ->select('perspective')
        ->distinct()
        ->orderBy('perspective')
        ->pluck('perspective');

        //this to get data for the stacked chart
        $data = DB::table('ips_tasks')
        ->selectRaw('perspective,
            SUM(CASE WHEN status = "Completed" THEN 1 ELSE 0 END) as completed,
            SUM(CASE WHEN status = "Transmitted" THEN 1 ELSE 0 END) as transmitted,
            SUM(CASE WHEN status = "Pending" THEN 1 ELSE 0 END) as pending
        ')
        ->groupBy('perspective')
        ->orderBy('perspective')
        ->get();

        //this preparing data for the chart
        $labels = $data->pluck('perspective');
        $completed = $data->pluck('completed');
        $transmitted = $data->pluck('transmitted');
        $pending = $data->pluck('pending');

        return view('dashboard', compact(
            'totalEmployers', 'totalBillings', 'issuedBillings', 'overdueBillings', 'generatedBillings', 'typeLabels', 'typeCounts', 'totalOverdueBillings', 'totalIssuedBillings', 'totalGeneratedBillings', 'totalCaseFolderBillings', 'caseFolderBillings', 'totalSettledBillings', 'settledBillings', 'statusLabels', 'statusCounts', 'latestImportedData', 'totalRemitting', 'totalAccountLoad', 'totalDelinquent', 'totalNonRemitting', 'loadLabels', 'loadCounts', 'perspectives', 'labels', 'completed', 'pending', 'transmitted'
        ));
    }

    public function getTatData(Request $request)
    {
        $perspective = $request->perspective;

        $data = DB::table('ips_tasks')
            ->selectRaw('
                DATE_FORMAT(status_date, "%Y-%m") as month,
                AVG(TAT) as avg_tat
            ')
            ->where('perspective', $perspective)
            ->whereNotNull('status_date')
            ->groupBy(DB::raw('DATE_FORMAT(status_date, "%Y-%m")'))
            ->orderBy('month')
            ->get();

        return response()->json($data);
    }
}
