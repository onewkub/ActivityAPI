<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class totalHour extends Model
{
    protected $fillable = [
        'year', 'faculty', 'major', 'other'
    ];
    protected $hidden = [
        'id'
    ];
}
