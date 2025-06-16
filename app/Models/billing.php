<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    //
    protected $fillable = ['employer_id', 'amount', 'applicable_period', 'no_of_months', 'premium', 'interest', 'type', 'control_number', 'status', 'file_path', 'latest'];

    public function employer(){
        return $this->belongsTo(employer::class);
    }
}
