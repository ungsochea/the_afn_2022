<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        return view('admins.posts.index');
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(404);
        if($request->q == 'delete'){
            $posts = Post::latest()->onlyTrashed()->paginate('7');
            $html = view('admins.posts.get_list_delete',compact('posts'))->render();
        }else{
            $posts = Post::latest()->paginate('7');
            $html = view('admins.posts.get_list',compact('posts'))->render();
        }
        return response()->json(compact('html'));

    }
    public function create(){
        $post = new Post();
        return view('admins.posts.form',compact('post'));
    }
    public function store(Request $request){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title'         => 'required|min:3|max:225',
            'slug'          => 'required|unique:posts',
            'description'   => 'required|min:3|max:225',
            'body'          => 'required|min:3',
            'is_activated'  => 'required',
            'published_at'  => 'required',
            'categories'    => 'required',
        ]);
        $request->request->add(['user_id' => auth()->user()->id]);
        $post = Post::create($request->except(['categories','tags']));
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        $response['message'] = "Post added successfully.";
        return response()->json(compact('response','post'));

        return response()->json($request->all());
    }
    public function edit(Post $post){
        return view('admins.posts.form',compact('post'));
    }
    public function update(Request $request,Post $post){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|unique:posts,slug,'.$post->id,
            'description'   => 'required|min:3|max:255',
            'body'          => 'required|min:3',
            'is_activated'  => 'required',
            'published_at'  => 'required',
            'categories'    => 'required',
        ]);

        $post->update($request->except(['categories','tags']));
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        $response['message'] = "Updated successfully.";
        return response()->json(compact('response','post'));
    }
    public function destroy(Request $request,Post $post){
        if(!$request->ajax()) return abort(500);
        if($post->delete()){
            $post_count = $post->count();
            $response['message'] = "Deleted successfully.";
            return response()->json(compact('response','post','post_count'),200);
        }else{
            $response['message'] = "Opp, something wrong.";
            return response()->json(compact('response'),500);
        }

    }
    public function search(Request $request){
        if(!$request->ajax()) return abort(404);
        $s = $request->search;
        $posts = Post::when($s,function($query) use ($s){
            $query->where('title','LIKE','%'.$s.'%');
        })
        ->latest()
        ->paginate('7');
        $html = view('admins.posts.get_list',compact('posts'))->render();
        return response()->json(compact('html'));
    }
    public function delete(){
        return view('admins.posts.index_delete');
    }
    public function restore(Request $request,$id){
        if(!$request->ajax()) return abort(500);
        $post = Post::withTrashed()->find($id);
        if($post->restore()){
            $post_count = Post::onlyTrashed()->count();
            $response['message'] = "Restore successfully.";
            return response()->json(compact('response','post','post_count'),200);
        }
    }
    public function destroy_forever(Request $request,$id){
        $post = Post::onlyTrashed()->find($id);
        if($post){
            if($post->forceDelete()){

                if($post->thumbnail){
                    if(Storage::disk('do_spaces')->exists('posts/large/'.$post->thumbnail)){
                        Storage::disk('do_spaces')->delete('posts/large/'.$post->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('posts/medium/'.$post->thumbnail)){
                        Storage::disk('do_spaces')->delete('posts/medium/'.$post->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('posts/small/'.$post->thumbnail)){
                        Storage::disk('do_spaces')->delete('posts/small/'.$post->thumbnail);
                    }
                    if(Storage::disk('do_spaces')->exists('posts/extra_small/'.$post->thumbnail)){
                        Storage::disk('do_spaces')->delete('posts/extra_small/'.$post->thumbnail);
                    }
                }

                $post_count = Post::onlyTrashed()->count();
                $response['message'] = "Deleted successfully.";
                return response()->json(compact('response','post','post_count'),200);
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
