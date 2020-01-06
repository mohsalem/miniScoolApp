<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    //
    public function classes()
    {
        return $this->belongsTo(classes::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function evaluations()
    {
        return $this->hasMany(evaluations::class);
    }
}
