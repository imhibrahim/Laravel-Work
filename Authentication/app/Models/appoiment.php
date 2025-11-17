<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appoiment extends Model
{
    function hospital(){
        return $this->belongsTo(hospital::class,'h_id');
    }
     function doctor(){
        return $this->belongsTo(doctor::class,'d_id');
    }
     function user(){
        return $this->belongsTo(user::class,'userid');
    }
}
