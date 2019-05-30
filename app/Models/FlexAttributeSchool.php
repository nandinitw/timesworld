<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlexAttributeSchool extends Model
{
    //
    protected $table = "flex_attribute_school";

    public function getAttributeValues($school_id,$attribute_id)
    {
        return $this    
        ->where('school_id',$school_id)
        ->where('flex_attribute_id',$attribute_id)
        ->where('status',1)
        ->get();
    }
}
