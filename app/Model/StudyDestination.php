<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudyDestination extends Model
{
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
