@extends('frontend.layouts.app')
@section('css')
    <style>
        .single-thumnail{
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
        }
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
<div class="container">
    {{--  <div class="entry-header entry-header-2 mb-50 mt-50 text-center">
        <div class="entry-meta meta-0 font-small mb-30"><a href="category.html"><span class="post-cat background4 text-danger">Film / Art</span></a></div>
        <h1 class="post-title mb-30">
            Stunning video ideas from leading magazines
            <span class="post-format-icon">
                <ion-icon name="videocam-outline"></ion-icon>
            </span>
        </h1>
        <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
            <span class="post-by">By <a href="author.html">Adam Liptak </a> & <a href="author.html">Michael D. Shear</a></span>
            <span class="post-on">18/09/2020 09:35 EST</span>
            <span class="time-reading">12 mins read</span>
            <p class="font-x-small mt-10">
                <span class="hit-count"><i class="ti-comment mr-5"></i>82 comments</span>
                <span class="hit-count"><i class="ti-heart mr-5"></i>68 likes</span>
                <span class="hit-count"><i class="ti-star mr-5"></i>8/10</span>
            </p>
        </div>
    </div>  --}}
    <!--end entry header-->
    <div class="row mb-50">
        <div class="col-lg-8 col-md-12">
            {{--  <div class="single-social-share single-sidebar-share mt-30">
                <ul>
                    <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                    <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                    <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                    <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                    <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i class="ti-email"></i></a></li>
                </ul>
            </div>  --}}
            @if ($video->type == 'yb')
            <figure class="single-thumnail mb-30">
                <iframe class="video" width="100%" height="100%" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </figure>

            @endif
            <h3 class="post-title mb-30">
                {{ $video->title ?? '' }}
            </h3>
            <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                @if ($video->source)
                <a class="entry-meta meta-0" href="{{ $video->source }}" target="_blank"><span class="post-in background1 text-danger font-x-small"><i class="ti-control-play"></i>Original Source</span></a>
                @endif
                {{-- <span class="post-by">By <a href="author.html">Adam Liptak </a> &amp; <a href="author.html">Michael D. Shear</a></span>
                <span class="post-on">18/09/2020 09:35 EST</span>
                <span class="time-reading">12 mins read</span> --}}
                {{-- <p class="font-x-small mt-10">
                    <span class="hit-count"><i class="ti-comment mr-5"></i>82 comments</span>
                    <span class="hit-count"><i class="ti-comment mr-5"></i>82 comments</span>
                    <span class="hit-count"><i class="ti-heart mr-5"></i>68 likes</span>
                    <span class="hit-count"><i class="ti-star mr-5"></i>8/10</span>
                </p> --}}
            </div>
            <hr>
            <div class="entry-main-content">
                <p>{!! $video->body !!}</p>
            </div>

            <div class="entry-bottom mt-50 mb-30">
                <div class="overflow-hidden mt-30">
                    <div class="tags float-left text-muted mb-md-30">
                        <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Tags: </span>
                        @foreach ($video->tags as $tag)
                        <a href="/video?tag={{ $tag->slug }}" rel="tag">{{ $tag->title }}</a>
                        @endforeach

                    </div>
                    {{-- <div class="single-social-share float-right">
                        <ul class="d-inline-block list-inline">
                            <li class="list-inline-item"><span class="font-small text-muted"><i class="ti-sharethis mr-5"></i>Share: </span></li>
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <!--author box-->
            {{-- <div class="author-bio border-radius-10 bg-white p-30 mb-40">
                <div class="author-image mb-30">
                    <a href="author.html"><img src="/assets/imgs/authors/author.png" alt="" class="avatar"></a></div>
                <div class="author-info">
                    <h3><span class="vcard author"><span class="fn"><a href="author.html" title="Posts by Robert" rel="author">Michael D. Shear</a></span></span></h3>
                    <h5 class="text-muted">
                        <span class="mr-15">Elite author</span>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                    </h5>
                    <div class="author-description">I think all aspiring and professional writers out there will agree when I say that ‘We are never fully satisfied with our work. We always feel that we can do better and that our best piece is yet to be written’. </div>
                    <a href="author.html" class="author-bio-link text-muted">View all posts</a>
                    <div class="author-social">
                        <ul class="author-social-icons">
                            <li class="author-social-link-facebook"><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
                            <li class="author-social-link-twitter"><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                            <li class="author-social-link-pinterest"><a href="#" target="_blank"><i class="ti-pinterest"></i></a></li>
                            <li class="author-social-link-instagram"><a href="#" target="_blank"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--End col-lg-8-->
        <div class="col-lg-4 col-md-12 sidebar-right sticky-sidebar">
            <div class="pl-lg-50">
                <div class="sidebar-widget mb-30">
                    <div class="widget-header mb-30">
                        <h5 class="widget-title">Most <span>Popular</span></h5>
                    </div>
                    <div class="post-aside-style-2">
                        <ul class="list-post">
                            <p>no data</p>
                            {{-- @for ($i = 0; $i < 7; $i++)
                            <li class="mb-30 wow fadeIn    animated" style="visibility: visible; animation-name: fadeIn;">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="https://thumbor.prod.vidiocdn.com/lHXkhJJWQjSrduKBLBNsBYpYc0M=/372x211/filters:quality(75)/vidio-web-prod-livestreaming/uploads/livestreaming/image/9341/premier-league-959ae8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Vancouver woman finds pictures and videos of herself online</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">K. Marry</a></span>
                                            <span class="post-on">4m ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endfor --}}

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!--End col-lg-4-->
    </div>
    <!--End row-->
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="#">
                <img class="border-radius-10 d-inline" src="/assets/imgs/ads-3.png" alt="">
            </a>
        </div>
    </div>

</div>
@endsection
