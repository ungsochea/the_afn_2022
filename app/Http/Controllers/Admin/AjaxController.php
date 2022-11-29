<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class AjaxController extends Controller
{
    public function slugGenerate(Request $request){
        if(!$request->ajax()) return abort(500);
        $slug =  strtolower(preg_replace('/\s+/u', '-', trim($request->slug)));
        return response()->json($slug);
    }
    public function getCategorySelect2(Request $request){
        if(!$request->ajax()) return abort(500);
        $data = [];
        $search = $request->q;
        $data = Category::when($search,function($query) use ($search){
            $query->where('title','LIKE',"%$search%");
        })->where('is_activated',true)->get(['id','title as text']);

        return ['results' => $data];
    }
    public function getTagSelect2(Request $request){
        if(!$request->ajax()) return abort(500);
        $data = [];
        $search = $request->q;
        $data = Tag::when($search,function($query) use ($search){
            $query->where('title','LIKE',"%$search%");
        })->where('is_activated',true)->get(['id','title as text']);

        return ['results' => $data];
    }
}
