<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluations extends Model
{
    //
    public function students()
    {
        return $this->belongsTo(students::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
