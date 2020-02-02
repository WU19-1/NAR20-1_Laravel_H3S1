<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $table = 'admin_activities';
    protected $guarded = [];
    public $timestamps = false;

}
