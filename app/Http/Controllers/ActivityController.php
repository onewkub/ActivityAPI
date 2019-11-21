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
        // dd(activity::all());
        return new ActivityCollectionResource(activity::all());
    }
    public function show($activity) {
        $id = $activity%10000;
        $year = ($activity - $id) /10000;
        // dd($id, $year);
        $res = activity::where('actID', $id)->where('actYear', $year)->get();
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
            'hour' => $request->hour,
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
    protected function removeRequired($id, $year){
        $res = isRequired::where('aid', $id)->where('year', $year)->delete();
        return response()->json(null, 201);
    }
    public function update(Request $request, $activity){
        $id = $activity%10000;
        $year = ($activity - $id) /10000;
        $res = activity::where('actID', $id)->where('actYear', $year);
        // dd($res);
        $res->update([
            'actYear' => $request->actYear,
            'actID' => $request->actID,
            'actName' => $request->actName,
            'detail' => $request->detail,
            'actDate' => $request->actDate,
            'hour' => $request->hour,
            'type' => $request->type
        ]);
        if($request->isRequired){
            $this->addRequire($id, $year);
        }
        else if(!$request->isRequired){
            $this->removeRequired($id, $year);
        }
        return response()->json($res->get(), 201);
    }
    
}
