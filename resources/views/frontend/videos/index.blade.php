@extends('frontend.layouts.app')

@section('content')
<div class="archive-header text-center mb-50">
    <div class="container">
        <h2>
            <span class="text-dark">Videos</span>
            <span class="post-count">1256 articles</span>
        </h2>
        <div class="breadcrumb">
            <span class="no-arrow"><i class="ti ti-location-pin mr-5"></i>You are here:</span>
            <a href="index.html" rel="nofollow">Home</a>
            <span></span>
            Daily News
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @for ($i = 0; $i < 20; $i++)
        <div class="slider-single col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="img-hover-scale border-radius-10">
                <span class="top-right-icon background10"><i class="mdi mdi-share"></i></span>
                <a href="/video/show">
                    <img class="border-radius-10" src="https://thumbor.prod.vidiocdn.com/lHXkhJJWQjSrduKBLBNsBYpYc0M=/372x211/filters:quality(75)/vidio-web-prod-livestreaming/uploads/livestreaming/image/9341/premier-league-959ae8.jpg" alt="post-slider">
                </a>
                <div class="play_btn play_btn_small">
                    <a class="play-video" href="/video/show">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
            <h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                <a href="/video/show">What Will It Take to Reopen the World to Travel?</a>
            </h5>
            <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                <span><span class="mr-5"><i class="fa fa-eye" aria-hidden="true"></i></span>30k</span>
                <span class="ml-15"><span class="mr-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>1.5k</span>
                <span class="ml-15"><span class="mr-5 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>15k</span>
                <a class="float-right" href="#"><i class="ti-bookmark"></i></a>
            </div>
        </div>
        @endfor

    </div>
    {{--  Ads  --}}
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="#">
                <img class="border-radius-10 d-inline" src="assets/imgs/ads.jpg" alt="post-slider">
            </a>
        </div>
    </div>

</div>
@endsection
