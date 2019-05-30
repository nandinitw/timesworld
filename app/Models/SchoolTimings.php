<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolTimings extends Model
{
    //

    protected $table = 'school_timings';
    
    public function schools(){
        return $this->belongsTo("App\Models\School");
    }
}
