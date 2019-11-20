<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\JoinActivity;
use Illuminate\Http\Request;

class JoinActivityController extends Controller
{
    public function store(Request $request, $activity){
        $id = $activity%10000;
        // dd($activity, $id);
        $year = ($activity - $id) /10000;
        $joinActivity = JoinActivity::create([
            'stdID' => $request->stdID,
            'actID' => $id,
            'actYear'=> $year
        ]);
        return response()->json($joinActivity, 201);
    }
}
