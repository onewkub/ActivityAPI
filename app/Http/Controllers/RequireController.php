<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequireCollectionResource;
use App\Http\Resources\RequireResource;
use App\isRequired;
use Illuminate\Http\Request;

class RequireController extends Controller
{
    public function show($require){
        // dd($require);
        $res = isRequired::where('year', $require)->get();
        // dd($res->get());
        return new RequireCollectionResource($res);
    }
}
