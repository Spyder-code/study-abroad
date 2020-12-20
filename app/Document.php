<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guard=[];

    public function user()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
