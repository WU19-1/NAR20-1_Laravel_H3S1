<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = ['password'];

    public function studentdetail(){
        return $this->hasOne(StudentDetail::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }

}
