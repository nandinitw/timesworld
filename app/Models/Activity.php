<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = "activities";
    
    public function schools(){
        return $this->belongsToMany('App\Models\School');
    }
}
