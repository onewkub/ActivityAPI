<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\student;
use App\User;

class StudentController extends Controller
{
    public function show($uid){
        // $uid = User::where('token', $token)->first()->uid;
        // dd($uid->first()->uid);
        $res = student::where('user_id', $uid)->first();
        // dd($res);
        return new Resource($res);
    }
}
