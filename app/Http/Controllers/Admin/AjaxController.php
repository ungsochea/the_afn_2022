<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function slugGenerate(Request $request){
        if(!$request->ajax()) return abort(500);
        $slug =  strtolower(preg_replace('/\s+/u', '-', trim($request->slug)));
        return response()->json($slug);
    }
}
