<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;

class ContactUsController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('twitter:image:alt','ASEAN Football News');

        // OpenGraph
        OpenGraph::setTitle('Contact Us');
        OpenGraph::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('image:alt', 'ASEAN Football News');
        OpenGraph::addImage(url()->to('/').'/images/thumbnail.png');

        // JsonLd
        JsonLd::setTitle('Contact Us');
        JsonLd::setDescription('ASEAN Football News was established in 2017 aims at promoting football in the Association of South East Asia to the people of this community as well as to the people around the world.');
        JsonLd::addImage(url()->to('/').'/images/thumbnail.png');

        // Twitter
        TwitterCard::setTitle('Contact Us');

        return view('frontend.contact_us.index');
    }
    public function store(Request $request){
        abort_if(!$request->ajax(),500);
        $request->validate([
            'name'              => 'required|min:2|max:255',
            'phone'             => 'nullable|min:2|max:255',
            'email'             => 'required|email|min:2|max:255',
            'description'       => 'required|min:2',
        ]);
        $ip = \Request::ip();

        // $ip = '58.97.224.28';
        $ipData = @json_decode(file_get_contents("http://ip-api.com/json/".$ip."?fields=query,countryCode,city,"));

        $contact_us = new ContactUs();
        $contact_us->name           = $request->name;
        $contact_us->email          = $request->email;
        $contact_us->phone          = $request->phone;
        $contact_us->description    = $request->description;
        $contact_us->ip             = $ipData->query ?? '';
        $contact_us->country        = $ipData->countryCode ?? '';
        $contact_us->city           = $ipData->city ?? '';
        if($contact_us->save()){
            $response['message'] = 'Your submit successfully.';
            return response()->json($response,200);
            // return response()->json($contact_us);
        }
    }
}
