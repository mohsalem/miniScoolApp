<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    //
    public $table = 'school';
    protected $fillable = ['name', ];
    public function class()
    {
        return $this->hasMany(classes::class);
    }
}
