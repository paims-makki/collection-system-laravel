<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class billing_histories extends Model
{
    protected $fillable =[
        'billing_id',
        'old_status',
        'new_status',
        'old_status_date',
        'new_status_date',
        'old_remarks',
        'new_remarks',
        'old_latest',
        'new_latest'
    ];

    public function billing(){
        return $this->belongTo(billing::class);
    }
}
