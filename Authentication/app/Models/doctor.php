<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    public function hospital(){
        return $this->belongsTo(hospital::class);
    }
}
