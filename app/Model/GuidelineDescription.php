<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GuidelineDescription extends Model
{
    public function guideline(){
        return $this->belongsTo(Guideline::class,'guideline_id','id');
    }
}
