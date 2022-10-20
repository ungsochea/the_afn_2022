<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        return view('admins.tags.index');
    }
    public function create(Request $request){
        $tag = new Tag();
        $html = view('admins.tags.form',compact('tag'))->render();
        return response()->json(compact('html'));
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(500);
        $tags = Tag::latest()->paginate('7');
        $html = view('admins.tags.get_list',compact('tags'))->render();
        return response()->json(compact('html'));
    }
    public function store(Request $request){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title' => 'required|min:1',
            'slug'  => 'required|min:1|unique:tags',
        ]);
        $tag = new Tag();
        $tag = $tag->create($request->all());
        $html = view('admins.tags.get_item',compact('tag'))->render();
        $response['message'] = 'Added successfully.';
        return response()->json(compact('response','html'));
    }
    public function edit(Request $request,Tag $tag){
        if(!$request->ajax()) return abort(500);
        $html = view('admins.tags.form',compact('tag'))->render();
        return response()->json(compact('html'));
    }
    public function update(Request $request,Tag $tag){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title' => 'required|min:1',
            'slug'  => 'required|min:1|unique:tags,slug,'.$tag->id,
        ]);
        $tag->update($request->all());
        $html = view('admins.tags.get_item',compact('tag'))->render();
        $response['message'] = 'Updated successfully.';
        return response()->json(compact('response','html'));
    }
    public function destroy(Request $request,Tag $tag){
        if(!$request->ajax()) return abort(500);
        if($tag->delete()){
            $tag_count = Tag::count();
            $response['message'] = 'Deleted successfully.';
            return response()->json(compact('response','tag_count'));
        }else{

        }

    }
    public function search(Request $request){
        if(!$request->ajax()) return abort(500);
        $s = $request->search;
        $tags = Tag::when($s,function($query) use ($s){
            $query->where('title','LIKE','%'.$s.'%');
        })
        ->latest()
        ->paginate('7');
        $html = view('admins.tags.get_list',compact('tags'))->render();
        return response()->json(compact('html'));
    }
}
