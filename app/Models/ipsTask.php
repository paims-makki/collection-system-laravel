<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ipsTask extends Model
{
    protected $fillable = ['status_date',
        'perspective',
        'responsible_unit',
        'specific_task',
        'requestor',
        'target_output',
        'actual_output',
        'status',
        'remarks',
        'editor',
        'TAT',
        'year',
        'month',
        'seq',
        'employer_id'
    ];

    protected $appends = ['control_number'];

    public function getControlNumberAttribute(){

        if (!$this->year || !$this->month || !$this->seq) {
            return null;
        }

        return sprintf(
            'MAR-COLLU-%d-%02d-%03d',
            $this->year,
            $this->month,
            $this->seq
        );
    }

    public static function createWithControlNumber(array $data): self
    {
        return DB::transaction(function () use ($data) {

            $now = Carbon::now();

            $year  = $now->year;
            $month = $now->month;

            $lastSeq = self::where('year', $year)
                ->where('month', $month)
                ->lockForUpdate()
                ->max('seq');

            $seq = $lastSeq ? $lastSeq + 1 : 1;

            return self::create(array_merge($data, [
                'year'  => $year,
                'month' => $month,
                'seq'   => $seq,
            ]));
        });
    }

    public function employer(){
        return $this->belongsTo(employer::class);
    }

}
