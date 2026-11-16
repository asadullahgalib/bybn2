<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImportantLink extends Model
{
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class,'service_category_id','id');
    }
}
