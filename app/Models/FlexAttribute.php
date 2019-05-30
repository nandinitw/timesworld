<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlexAttribute extends Model
{
    //
    protected $table = "flex_attributes";

    public function values(){
        return $this->hasMany('App\Models\FlexAttributeValue');
    }

    //public function schools(){
       // return $this->belongsToMany('App\School');
   // }

    public function getAllFlexAttributes(){
        $attributes = $this
                        ->select('id','attribute_name','status')
                        ->where('status',1)
                        ->get();
        
        return $attributes;
    }


}
