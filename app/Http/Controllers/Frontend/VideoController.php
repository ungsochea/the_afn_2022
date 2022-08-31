<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        return view('frontend.videos.index');
    }
    public function show(){
        return view('frontend.videos.show');
    }
}
