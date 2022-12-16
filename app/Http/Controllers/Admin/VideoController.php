<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(){
        return view('admins.videos.index');
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(404);
        if($request->q == 'delete'){
            $videos = Video::latest()->onlyTrashed()->paginate('7');
            $html = view('admins.videos.get_list_delete',compact('videos'))->render();
        }else{
            $videos = Video::latest()->paginate('7');
            $html = view('admins.videos.get_list',compact('videos'))->render();
        }
        return response()->json(compact('html'));

    }
    public function create(){
        $video = new Video();
        return view('admins.videos.form',compact('video'));
    }
    public function store(Request $request){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title'         => 'required|min:3|max:255',
            'description'   => 'required|min:3|max:255',
            'is_activated'  => 'required',
            'published_at'  => 'required',
            'categories'    => 'required',
        ]);
        $video = Video::create([
            'id'            => Video::generateUserid(),
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'link'          => $request->link,
            'type'          => $request->type,
            'thumbnail'     => $request->thumbnail,
            'description'   => $request->description,
            'is_activated'  => $request->is_activated,
            'published_at'  => $request->published_at,
        ]);
        $response['message'] = "Added successfully.";
        return response()->json(compact('response','video'));
    }
    public function edit(Request $request,Video $video){
        return view('admins.videos.form',compact('video'));
    }
    public function update(Request $request,Video $video){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title'         => 'required|min:3|max:255',
            'description'   => 'required|min:3|max:255',
            'is_activated'  => 'required',
            'published_at'  => 'required',
            'categories'    => 'required',
        ]);
        $video->update([
            'title'         => $request->title,
            'link'          => $request->link,
            'type'          => $request->type,
            'thumbnail'     => $request->thumbnail,
            'description'   => $request->description,
            'is_activated'  => $request->is_activated,
            'published_at'  => $request->published_at,
        ]);
        $video->categories()->sync($request->categories);
        $video->tags()->sync($request->tags);
        $response['message'] = "Update successfully.";
        return response()->json(compact('response','video'));
    }
    public function destroy(Request $request,Video $video){
        if(!$request->ajax()) return abort(500);
        if($video->delete()){
            $video_count = Video::count();
            $response['message'] = "Deleted successfully.";
            return response()->json(compact('response','video','video_count'),200);
        }else{
            $response['message'] = "Opp, something wrong.";
            return response()->json(compact('response'),500);
        }
    }
    public function search(Request $request){
        if(!$request->ajax()) return abort(404);
        $s = $request->search;
        $posts = Video::when($s,function($query) use ($s){
            $query->where('title','LIKE','%'.$s.'%');
        })
        ->latest()
        ->paginate('7');
        $html = view('admins.posts.get_list',compact('posts'))->render();
        return response()->json(compact('html'));
    }
    public function delete(){
        return view('admins.videos.index_delete');
    }
    public function restore(Request $request,$id){
        if(!$request->ajax()) return abort(500);
        $video = Video::withTrashed()->find($id);
        if($video->restore()){
            $video_count = Video::onlyTrashed()->count();
            $response['message'] = "Restore successfully.";
            return response()->json(compact('response','video','video_count'),200);
        }
    }
    public function destroy_forever(Request $request,$id){
        $video = Video::onlyTrashed()->find($id);
        if($video){
            if($video->forceDelete()){

                if($video->thumbnail){
                    if(Storage::disk('do_spaces')->exists('videos/large/'.$video->thumbnail)){
                        Storage::disk('do_spaces')->delete('videos/large/'.$video->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('videos/medium/'.$video->thumbnail)){
                        Storage::disk('do_spaces')->delete('videos/medium/'.$video->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('videos/small/'.$video->thumbnail)){
                        Storage::disk('do_spaces')->delete('videos/small/'.$video->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('videos/extra_small/'.$video->thumbnail)){
                        Storage::disk('do_spaces')->delete('videos/extra_small/'.$video->thumbnail);
                    }
                }

                $video_count = Video::onlyTrashed()->count();
                $response['message'] = "Deleted successfully.";
                return response()->json(compact('response','video','video_count'),200);
            }else{
                $response['message'] = "Opp, something wrong.";
                return response()->json(compact('response'),500);
            }
        }else{
            $response['message'] = "Opp, something wrong.";
            return response()->json(compact('response'),500);
        }

    }
}
