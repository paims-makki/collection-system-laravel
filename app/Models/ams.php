<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ams extends Model
{
    protected $fillable = ['employer_name', 'pen', 'january', 'jan_ee', 'february', 'feb_ee', 'march', 'mar_ee', 'april', 'apr_ee', 'may', 'may_ee', 'june', 'jun_ee', 'july', 'jul_ee', 'august', 'aug_ee', 'september', 'sep_ee', 'october', 'oct_ee', 'november', 'nov_ee', 'december', 'dec_ee', 'status', 'type', 'remarks', 'reporting_month'];
}
