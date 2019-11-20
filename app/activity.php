<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $fillable = [
        'actYear', 'actID','actName', 'detail', 'hour', 'actDate', 'type'
    ];
    protected $hidden = ['id'];
}
