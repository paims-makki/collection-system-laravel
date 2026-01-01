<?php

namespace App\Imports;

use App\Models\ams;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AmsImport implements ToModel, WithHeadingRow
{
    public function model(array $row){
        //dd($row);
        return new ams([
            'employer_name' => $row['employer_name'],
            'pen' => $row['pen'],
            'january' => $row['january'],
            'jan_ee' => $row['jan_ee'],
            'february' => $row['february'],
            'feb_ee' => $row['feb_ee'],
            'march' => $row['march'],
            'mar_ee' => $row['mar_ee'],
            'april' => $row['april'],
            'apr_ee' => $row['apr_ee'],
            'may' => $row['may'],
            'may_ee' => $row['may_ee'],
            'june' => $row['june'],
            'jun_ee' => $row['jun_ee'],
            'july' => $row['july'],
            'jul_ee' => $row['jul_ee'],
            'august' => $row['august'],
            'aug_ee' => $row['aug_ee'],
            'september' => $row['september'],
            'sep_ee' => $row['sep_ee'],
            'october' => $row['october'],
            'oct_ee' => $row['oct_ee'],
            'november' => $row['november'],
            'nov_ee' => $row['nov_ee'],
            'december' => $row['december'],
            'dec_ee' => $row['dec_ee'],
            'status' => $row['status'],
            'type' => $row['type'],
            'remarks' => $row['remarks'],
            'reporting_month' => $row['reporting_month']
        ]);
    }
}
