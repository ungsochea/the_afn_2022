@forelse ($videos as $video)
<div class="slider-single col-lg-3 col-md-6 col-sm-12 mb-30">
    <div class="img-hover-scale border-radius-10">
        {{-- <span class="top-right-icon background10"><i class="mdi mdi-share"></i></span> --}}
        <a href="/video?v={{ $video->id }}">
            <img class="border-radius-10" src="{{ $video->thumbnail_m }}" alt="post-slider">
        </a>
        <div class="play_btn play_btn_small">
            <a class="play-video" href="{{ $video->source }}">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
        <a href="/video?v={{ $video->id }}">{{ $video->title ?? '' }}</a>
    </h5>
    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
        <span><span class="mr-5"><i class="fa fa-eye" aria-hidden="true"></i></span>{{ $video->views ?? '0' }}</span>
        {{-- <span class="ml-15"><span class="mr-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>1.5k</span>
        <span class="ml-15"><span class="mr-5 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>15k</span>
        <a class="float-right" href="#"><i class="ti-bookmark"></i></a> --}}
    </div>
</div>
@empty

@endforelse
