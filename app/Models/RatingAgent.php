<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingAgent extends Model
{
    //
    protected $table = "rating_agents";

    public function schools(){
        return $this->belongsToMany('App\Models\School');
    }

    public function ratings(){
        return $this->hasMany('App\Models\RatingAgentSchool');
    }

    public function getAllAgents()
    {
        return $this->select('id','agent_name','status')
                    ->where('status',1)
                    ->get();
    }
}
