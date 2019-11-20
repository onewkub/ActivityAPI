<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequireCollectionResource;
use App\Http\Resources\RequireResource;
use App\isRequired;
use Illuminate\Http\Request;

class RequireController extends Controller
{
    public function show($year){
        // dd($require);
        $res = isRequired::where('year', $year)->get();
        // dd($res->get());
        return new RequireCollectionResource($res);
    }
}
