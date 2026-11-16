<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UniversityUndergraduateProgram extends Model
{
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function university(){
        return $this->belongsTo(University::class,'university_id','id');
    }
}
