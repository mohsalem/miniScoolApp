<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    //

    public function students()
    {
        return $this->hasMany(students::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
