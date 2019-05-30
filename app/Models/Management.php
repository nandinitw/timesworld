<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Management extends Model
{
    protected $table = 'management';
    
    public function schools(){
        return $this->hasMany("App\Models\School");
    }
}
