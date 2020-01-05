<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    //
    public function class()
    {
        return $this->hasMany(classes::class);
    }
}
