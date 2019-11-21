<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show($uid){
        $res = student::where('user_id', $uid)->get();
        return new Resource($res);
    }
}
