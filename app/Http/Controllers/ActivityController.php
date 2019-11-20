<?php

namespace App\Http\Controllers;

use App\activity;
use App\Http\Resources\ActivityCollectionResource;
use App\Http\Resources\ActivityResource;
use App\isRequired;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        dd(activity::all());
        return new ActivityCollectionResource(activity::all());
    }
    public function show($activity) {
        $id = $activity%10000;
        $year = ($activity - $id) /10000;
        // dd($id, $year);
        $res = activity::where('actID', $id)->where('actYear', $year)->first();
        // dd($respond);
        return new ActivityResource($res);
    }

    public function store(Request $request){
        // dd($request->all());
        // dd($request->isRequired);
        $activity = activity::create([
            'actYear' => $request->actYear,
            'actID' => $request->actID,
            'actName' => $request->actName,
            'detail' => $request->detail,
            'actDate' => $request->actDate,
            'actHour' => $request->actHour,
            'type' => $request->type

        ]);
        if($request->isRequired) {
            // dd("hi");
            $this->addRequire($request->actID, $request->actYear);
        
        }

        return response()->json($activity, 201);
    }

    protected function addRequire($id, $year){
        isRequired::create([
            'aid' => $id,
            'year' => $year
        ]);
    }

    public function update(Request $request, $activity){
        $id = $activity%10000;
        $year = ($activity - $id) /10000;
        $res = activity::where('actID', $id)->where('actYear', $year);
        // dd($res);
        $res->update($request->all());
        return response()->json($res->get(), 201);
    }
    
}
