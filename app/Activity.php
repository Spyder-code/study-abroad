<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['user_id','nama','subjek'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
