<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    protected $table = "curriculums";

    public function schools(){
        return $this->belongsToMany('App\Models\School');
    }
}
