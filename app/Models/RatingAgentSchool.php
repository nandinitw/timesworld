<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingAgentSchool extends Model
{
    //
    protected $table = "rating_agent_school";

    public function rating_agent(){
        return $this->belongsTo('App\Models\RatingAgent');
    }

    public function schools(){
        return $this->belongsToMany('App\Models\School');
    }

    public function getRatings($school_id,$agent_id)
    {
        return $this    
        ->where('school_id',$school_id)
        ->where('rating_agent_id',$agent_id)
        ->where('status',1)
        ->get();
    }
}
