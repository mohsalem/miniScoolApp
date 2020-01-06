<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    //
    public $table = 'classes';

    protected $fillable =['name', ];
    public function students()
    {
        return $this->hasMany(students::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function school()
    {
        return $this->belongsTo(school::class);
    }
}
