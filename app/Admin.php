<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    protected $guarded = [];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value){}

    public function getRememberTokenName()
    {
        return null;
    }
}
