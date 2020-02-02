<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'detail_id';
    public $timestamps = false;

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
