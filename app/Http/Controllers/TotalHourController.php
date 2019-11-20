<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\totalHour;
use Illuminate\Http\Request;

class TotalHourController extends Controller
{
    public function show($year){
        $res = totalHour::where('year', $year)->get();
        return new Resource($res);
    }
    public function store(Request $request){
        $totalHour = totalHour::create($request->all());
        return response()->json($totalHour, 201);
    }
    public function update(Request $request, $year){
        $res = totalHour::where('year', $year);
        $res->update($request->all());
        return response()->json($res->get(), 201);
    }
}
