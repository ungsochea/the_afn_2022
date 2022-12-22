<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;

class VideoController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Videos');
        SEOMeta::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('twitter:image:alt','ASEAN Football News');

        // OpenGraph
        OpenGraph::setTitle('Videos');
        OpenGraph::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('image:alt', 'ASEAN Football News');
        OpenGraph::addImage(url()->to('/').'/images/thumbnail.png');

        // JsonLd
        JsonLd::setTitle('Videos');
        JsonLd::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        JsonLd::addImage(url()->to('/').'/images/thumbnail.png');

        // Twitter
        TwitterCard::setTitle('Videos');

        $videos = Video::latest()->active()->paginate('16');
        return view('frontend.videos.index',compact('videos'));
    }
    public function show(Request $requst){
        // abort_if(!$requst,404);
        if($requst->v){
            $video = Video::find($requst->v);

            // SEOMeta
            SEOMeta::setTitle($video->title);
            SEOMeta::setDescription($video->description);
            SEOMeta::setCanonical(url()->current().'?v='.$video->id);
            SEOMeta::addMeta('twitter:image:alt',$video->title);

            // OpenGraph
            OpenGraph::setTitle($video->title);
            OpenGraph::setDescription($video->description);
            OpenGraph::setUrl(url()->current().'?v='.$video->id);
            OpenGraph::addProperty('type', 'video');
            OpenGraph::addProperty('video:type', 'application/x-shockwave-flash');
            OpenGraph::addProperty('video',$video->source);
            OpenGraph::addProperty('video:secure_url',$video->source);
            OpenGraph::addProperty('video:width','486');
            OpenGraph::addProperty('video:height','273');
            OpenGraph::addProperty('image:alt', $video->title);
            OpenGraph::addImage($video->thumbnail_m);

            // JsonLd
            JsonLd::setTitle($video->title);
            JsonLd::setDescription($video->description);
            JsonLd::addImage($video->thumbnail_m);

            // Twitter
            TwitterCard::setTitle($video->title);

            $video->increment('views');
            return view('frontend.videos.show',compact('video'));
        }elseif($requst->tag){
            $tag = Tag::where('slug',$requst->tag)->first();
            $videos = $tag->videos()->latest()->active()->paginate('16');
            return view('frontend.videos.index',compact('videos'));
        }else{
            return abort(404);
        }

    }
}
