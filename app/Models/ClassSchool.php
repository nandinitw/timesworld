<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchool extends Model
{
    //
    protected $table = "class_school";

    public function classe(){
        return $this->belongsTo('App\Models\Classe');
    }

    public function getFeeRange($school_id){
        $minFee = $this->getMinFee($school_id);
        $maxFee = $this->getMaxFee($school_id);

        return $minFee."-".$maxFee;
    }

    public function getMinFee($school_id)
    {
        return $this->where('status',1)
                    ->where('school_id',$school_id)
                    ->min('fees');                    
    }

    public function getMaxFee($school_id)
    {
        return $this->where('status',1)
                    ->where('school_id',$school_id)
                    ->max('fees');
    }
}
