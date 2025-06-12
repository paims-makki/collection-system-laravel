<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
    //
    protected $fillable = ['name', 'PEN', 'address', 'no_of_employees', 'name_of_head', 'type', 'classification', 'latest'];

    public function billing(){
        return $this->belongsToMany(billing::class);
    }
}
