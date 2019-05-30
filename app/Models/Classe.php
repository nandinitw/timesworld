<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
    protected $table = "classes";

    public function getClasses(){
        return $this    
        ->where('status',1)
        ->get();
    }

    public function getClassRange(){
        return $this->getFirstClass()."-".$this->getLastClass();
    }

    public function getFirstClass(){
        return $this->first()->class;
    }

    public function getLastClass(){
        return $this->where('status',1)->orderBy('id', 'DESC')->first()->class;
    }
}
