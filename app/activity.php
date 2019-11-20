<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $fillable = [
        'actName', 'actDetail', 'hour', 'actDate', 'actID', 'actYear', 'type', 'detail'
    ];
    protected $hidden = ['id'];
}
