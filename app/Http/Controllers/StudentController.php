<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\JoinActivity;
use App\student;
use App\User;

class StudentController extends Controller
{
    public function show($uid){
        $res = student::where('user_id', $uid)->first();
        return new Resource($res);
    }

    public function getStudentActivity($aid){
        $id = $aid%10000;
        $year = ($aid - $id) /10000;
        $res = User::whereIn('uid', student::select('user_id')->whereIn('studentID', function($query)use($id, $year){
            $query->select('stdID')->from('join_activities')->where([['actYear', $year], ['actID', $id]]);
        }))->get();
        // dd($res);
        return response()->json(["data"=> $res], 200);
    }
}
