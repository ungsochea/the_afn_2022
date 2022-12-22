<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Models\Video;
class HomeController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('twitter:image:alt','ASEAN Football News');

        // OpenGraph
        OpenGraph::setTitle('Home');
        OpenGraph::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('image:alt', 'ASEAN Football News');
        OpenGraph::addImage(url()->to('/').'/images/thumbnail.png');

        // JsonLd
        JsonLd::setTitle('Home');
        JsonLd::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        JsonLd::addImage(url()->to('/').'/images/thumbnail.png');

        // Twitter
        TwitterCard::setTitle('Home');

        $videos = Video::latest()->active()->limit('8')->get();
        return view('frontend.homes.index',compact('videos'));
    }
}
