<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlexAttributeValue extends Model
{
 
    protected $table = "flex_attributes";

    public function attributes(){
        return $this->belongsTo('App\Models\FlexAttribute');
    }
    
}
