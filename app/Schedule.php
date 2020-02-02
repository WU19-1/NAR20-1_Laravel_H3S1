<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'schedule_id';
    public $timestamps = false;

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
