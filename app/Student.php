<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nama',
        'tgl_lahir',
        'tempat_lahir',
        'no_passport',
        'negara',
        'alamat',
        'phone',
        'email',
        'image',
        'nodaf',
        'status'
    ];
}
