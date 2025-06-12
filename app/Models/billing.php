<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    //
    public function employer(){
        return $this->belongsToMany(employer::class);
    }
}
