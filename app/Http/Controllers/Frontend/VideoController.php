<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
class VideoController extends Controller
{
    public function index(){

        $videos = Video::latest()->active()->paginate('16');
        return view('frontend.videos.index',compact('videos'));
    }
    public function show(Request $requst){
        // abort_if(!$requst,404);
        if($requst->v){
            $video = Video::find($requst->v);
            $video->increment('views');
            return view('frontend.videos.show',compact('video'));
        }elseif($requst->tag){
            return 'ok';
        }else{
            return abort(404);
        }

    }
}
