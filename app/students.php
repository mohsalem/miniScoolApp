<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    //
    public function class()
    {
        return $this->belongsTo(classes::class);
    }
    public function evaluations()
    {
        return $this->hasMany(evaluations::class);
    }
}
