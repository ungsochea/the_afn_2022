
 @foreach ($popular_videos as $popular_video)
 <li class="mb-30 wow fadeIn    animated" style="visibility: visible; animation-name: fadeIn;">
     <div class="d-flex">
         <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
             <a class="color-white" href="single.html">
                 <img src="{{ $popular_video->thumbnail_s }}" alt="">
             </a>
         </div>
         <div class="post-content media-body">
             <h6 class="post-title mb-10 text-limit-2-row"><a href="/video?v={{ $popular_video->id }}">{{ $popular_video->title }}</a></h6>
             <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                 {{-- <span class="post-by">By <a href="author.html">K. Marry</a></span> --}}
                 <span class="post-on"><i class="fa fa-eye"></i></span>{{ $popular_video->views ?? '0' }}</span>
             </div>
         </div>
     </div>
 </li>
 @endforeach
