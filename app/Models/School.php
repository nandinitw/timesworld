<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    
    protected $table = 'schools';

    public function getAllSchools(){
        return $this->where('status',1)->get();
    }
    
    public function management(){
        return $this->belongsTo('App\Models\Management');
    }

    public function curriculums(){
        return $this->belongsToMany('App\Models\Curriculum')->where('curriculums.status',1);
    }

    public function amenities(){
        return $this->belongsToMany('App\Models\Amenties')->where('amenties.status',1);
    }

    public function activities(){
        return $this->belongsToMany('App\Models\Activity')->where('activities.status',1);
    }

    public function timings(){
        return $this->hasMany('App\Models\SchoolTimings')->where('school_timings.status',1);
    }

    public function rating_agents(){
        return $this->belongsToMany('App\Models\RatingAgent')->where('rating_agents.status',1);
    }

    public function ratings(){
        return $this->hasMany('App\Models\RatingAgentSchool')->where('rating_agent_school.status',1);
    }

   // public function attributes(){
        //return $this->belongsToMany('App\FlexAttribute');
    //}

    public function attribute_values(){
        return $this->hasMany('App\Models\FlexAttributeValue')->where('rating_agent_school.status',1);
    }


}

