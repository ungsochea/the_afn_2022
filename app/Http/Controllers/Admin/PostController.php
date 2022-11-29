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
    public function create(){
        $post = new Post();
        return view('admins.posts.form',compact('post'));
    }
}
