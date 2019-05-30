<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenties extends Model
{
    //
    protected $table = "amenties";
    
    public function schools(){
        return $this->belongsToMany('App\Models\School');
    }
}
