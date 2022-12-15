<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
        return view('admins.posts.index');
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(404);
        $posts = Post::latest()->paginate('5');
        $html = view('admins.posts.get_list',compact('posts'))->render();
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
            //'categories'    => 'required',
        ]);
        $request->request->add(['user_id' => auth()->user()->id]);
        $post = Post::create($request->all());
        // $post = Post::create($request->except(['categories','tags']));
        // $post->categories()->attach($request->categories);
        // $post->tags()->attach($request->tags);
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
            // 'categories'    => 'required',
        ]);

        // $request->request->add(['user_id' => auth()->user()->id]);
        $post->update($request->all());
        // $post->update($request->except(['categories','tags']));
        // $post->categories()->sync($request->categories);
        // $post->tags()->sync($request->tags);
        $response['message'] = "Updated successfully.";
        return response()->json(compact('response','post'));
    }
}
