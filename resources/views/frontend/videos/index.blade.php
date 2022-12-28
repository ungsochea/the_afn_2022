@extends('frontend.layouts.app')

@section('content')
<div class="archive-header text-center mb-50">
    <div class="container">
        <h2>
            <span class="text-dark">Videos</span>
            <span class="post-count">{{ App\Models\Video::active()->count() }} videos</span>
        </h2>
        <div class="breadcrumb">
            <span class="no-arrow"><i class="ti ti-location-pin mr-5"></i>You are here:</span>
            <a href="/" rel="nofollow">Home</a>
            <span></span>
           Videos
        </div>
    </div>
</div>
<div class="container">
    <div class="row" id="get_data">
        <div class="col-sm-12">
            <div class="text-center">
                <p>Loading ...</p>
            </div>
        </div>

    </div>
    <div class="row mb-50">
        <div class="col-sm-4 offset-sm-4" id="btn_load">
            {{-- <button id="load_more" class="btn btn-secondary btn-block" data-href="#" onclick=""> Load More ... </button> --}}
        </div>
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
@section('js')
    <script>
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var page = 0;
        $(function(){
            $.ajax({
                url: '/ajax-get-videos',
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    if(data.videos.total == 0){
                        $('#get_data').html('<div class="col-sm-12"><div class="text-center"><p>No Videos</p></div></div>');
                    }else{
                        $('#get_data').html(data.html);
                        var page = data.videos.current_page+1;
                        $('#btn_load').html('<button id="load_more" onclick="more('+page+')" class="btn btn-secondary btn-block" > Load More ... </button>')
                        $('#load_more').attr('onclick','more('+page+')')
                    }
                },
                error: function (data) {
                    console.log(data)
                }
            });
        });
        function more(url){
            $('#load_more').html('Loading...');
            $('#load_more').attr('disabled',true);
            $.ajax({
                url: '/ajax-get-videos?page='+url,
                type: "GET",
                dataType: 'json',
                beforeSend: function () {

                    $('#load_more').html('Load More ...');
                    $('#load_more').attr('disabled',true);

                },
                success: function (data) {
                    var page = data.videos.current_page+1;
                    $('#get_data').append(data.html);
                    $('#btn_load').html('<button id="load_more" onclick="more('+page+')" class="btn btn-secondary btn-block" > Load More ... </button>')
                    $('#load_more').html('Load More ...');
                    $('#load_more').attr('disabled',false);
                    if(data.videos.current_page == data.videos.last_page){
                        $('#btn_load').empty();
                    }
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
    </script>
@endsection
