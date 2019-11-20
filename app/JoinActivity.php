<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinActivity extends Model
{
    protected $fillable = [
        'stdID', 'actID'
    ];
}
