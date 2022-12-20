@extends('admins.layouts.app')
@section('main_title',$video->id ? 'Update Video' : 'Add Video')
@section('css')
    <link rel="stylesheet" href="/admins/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/admins/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/admins/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/admins/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
<style>
    .select2-selection--single {
        height: 40px!important;
    }
    .select2-selection__choice {
        color: #ffffff!important;
        border: 0!important;
        border-radius: 3px!important;
        padding: 6px!important;
        font-size: .625rem!important;
        font-family: inherit!important;
        line-height: 1!important;
        background: #727cf5!important;
    }
    .element-cus {
        animation: pulse 1s ;
    }
    @keyframes pulse {
        0% {
            background-color: #06df72;
        }
        100% {
            background-color: #FFFFFF;
        }
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
    }
    .fileUpload #logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .img-preview {
        width: 100%;
        margin-bottom: 10px;
    }
    .main-img-preview {
        text-align: center;
    }
</style>
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">{{ $video->id ? 'Update Video' : 'Add Video'}}</h4>
    </div>
</div>
<form class="row mb-3">
    <div class="col-sm-9 stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="mb-1">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $video->title ?? ''}}">
                <label id="title-error" class="error text-danger title" for="title"></label>
            </div>
            <div class="mb-1">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $video->description ?? ''}}</textarea>
                <label id="description-error" class="error text-danger description" for="description"></label>
            </div>
            <div class="mb-1">
                <label for="link" class="form-label">Video Type <span class="text-danger">*</span></label>
                <select class="form-select" id="type" name="type">
                    @foreach (VideoType() as $value => $key)
                    <option value="{{ $value }}" {{ $video->type == $value ? 'selected' : ''}}>{{ $key}}</option>
                    @endforeach
                </select>
                <label id="link-error" class="error text-danger link" for="link"></label>
            </div>
            <div class="mb-1">
                <label for="link" class="form-label">Link or ID</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Enter link" value="{{ $video->link ?? ''}}">
                <label id="link-error" class="error text-danger link" for="link"></label>
            </div>
            <div class="mb-1">
                <label for="source" class="form-label">Original Source</label>
                <input type="text" class="form-control" id="source" name="source" placeholder="Enter source link" value="{{ $video->source ?? ''}}">
                <label id="source-error" class="error text-danger source" for="source"></label>
            </div>
            @if ($video->id)
            <div class="row">
                <div class="form-group">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                </div>

                <label for="file" class="form-label">File</label>
                <div class="col-sm-10">
                    <div class="mb-1">
                        <input type="file" accept="video/mp4,video/x-m4v,video/*" class="form-control" id="video_file" name="video_file" placeholder="Enter video_file">
                        <label id="video_file-error" class="error text-danger video_file" for="video_file"></label>
                    </div>
                </div>
                <div class="col-sm-2 mb-1">
                    <button id="video_upload" class="btn btn-success" disabled>Upload</button>
                </div>
            </div>
            @endif

            @if ($video->file_name)
            <div class="mb-1 text-center">
                <video
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    width="720"
                    height="360"
                    poster="/images/video_thumbnail.png"
                    data-setup="{}"
                >
                    <source src="https://afn.sgp1.cdn.digitaloceanspaces.com/ASC2020/IndonesiavsCambodiaAFFSuzukiCup2020GroupStage.mp4" type="video/mp4" />
                    <source src="https://afn.sgp1.cdn.digitaloceanspaces.com/ASC2020/IndonesiavsCambodiaAFFSuzukiCup2020GroupStage.mp4" type="video/webm" />
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                    >
                    </p>
                </video>
            </div>
            @endif

        </div>
      </div>
    </div>
    <div class="col-sm-3 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="mb-0">
                <label for="published_at" class="form-label">Published At <span class="text-danger">*</span></label>
                <div class="input-append date datepicker form_datetime">
                    <input class="form-control" type="text" value="{{ $video->published_at ?? ''}}" value="{{ $video->published_at ?? ''}}" id="published_at" name="published_at" placeholder="Set time">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
                <label id="published_at-error" class="error text-danger published_at" for="published_at"></label>
            </div>
            <div class="mb-3">
                <label for="is_activated" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select" id="is_activated" name="is_activated">
                    @foreach (Status() as $value => $key)
                    <option value="{{ $value }}" {{ $video->is_activated == $value ? 'selected' : ''}}>{{ $key}}</option>
                    @endforeach
                </select>
                <label id="is_activated-error" class="error text-danger is_activated" for="is_activated"></label>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-select" id="categories" name="categories" multiple>
                    @foreach ($video->categories as $category)
                    <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
                    @endforeach
                </select>
                <label id="category_id-error" class="error text-danger category_id" for="category_id"></label>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tag <span class="text-danger">*</span></label>
                <select class="form-select" id="tags" name="tags" multiple>
                    @foreach ($video->tags as $tag)
                    <option value="{{ $tag->id }}" selected="selected">{{ $tag->title }}</option>
                    @endforeach
                </select>
                <label id="tag_id-error" class="error text-danger tag_id" for="tag_id"></label>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail<span class="text-danger">*</span></label>
                <div class="form-group">
                    <div class="main-img-preview">
                        <img class="thumbnail img-preview" src=" {{ $video->id ? $video->thumbnail_m : '/images/video_thumbnail.png'}}" title="Preview Logo" width="150">
                    </div>
                    <div class="input-group">
                        <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                        <div class="input-group-btn">
                            <div class="fileUpload btn btn-danger fake-shadow">
                                <span><i class="glyphicon glyphicon-upload"></i> Choose file</span>
                                <input id="logo-id" name="thumbnail" type="file" accept="image/*" class="attachment_upload">
                            </div>
                        </div>
                    </div>
                </div>
                <label id="thumbnail-error" class="error text-danger thumbnail" for="thumbnail"></label>
            </div>
          </div>
        </div>
      </div>
</form>
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.video.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back</a>
        @if ($video->id)
        <a href="javascript:;" id="btnSubmit" class="btn btn-success" data-id="{{ $video->id }}"> Update</a>
        @else
        <button type="button" id="btnSubmit" class="btn btn-success" onclick="{{ $video->id ? 'update('.$video->id.')':'store()'}}">{{ $video->id ? 'Update' : 'Save'}}</button>
        @endif
    </div>
</div>
@endsection
@section('js')
    <script src="/admins/vendors/tinymce/tinymce.min.js"></script>
    <script src="/admins/vendors/select2/select2.min.js"></script>
    <script src="/admins/vendors/moment/moment.min.js"></script>
    <script src="/admins/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
    <script src="/admins/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script>
            $('#is_activated').select2();
            $('#categories').select2({
                ajax: {
                    url: '/admin/ajax-category-select2',
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                          results: data.results
                        };
                    }
                },
                placeholder: "Please select category",
            });
            $('#tags').select2({
                ajax: {
                    url: '/admin/ajax-tag-select2',
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                          results: data.results
                        };
                    }
                },
                placeholder: "Please select tag",
            });
            $(document).ready(function() {
                var brand = document.getElementById('logo-id');
                brand.className = 'attachment_upload';
                brand.onchange = function() {
                    document.getElementById('fakeUploadLogo').value = this.value.substring(12);
                };
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.img-preview').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#logo-id").change(function() {
                    readURL(this);
                });
            });
            $(".form_datetime").datetimepicker({
                format: "yyyy-mm-dd hh:ii:ss",
                autoclose: true,
                todayBtn: true,
            });

            $('#video_file').change(function(){
                if( $("input[name=video_file]")[0].files.length != 0 ){
                    $( "#video_upload" ).prop( "disabled", false );
                    $('label.error').html('');
                    $("input[name=video_file]").removeClass('is-invalid')

                    // formData.append('thumbnail', $("input[name=thumbnail]")[0].files[0]);
                }
            })
            $('#video_upload').click(function(e){
                e.preventDefault();
                //console.log('ok')
                var formData = new FormData();
                if( $("input[name=video_file]")[0].files.length != 0 ){
                    formData.append('video_file', $("input[name=video_file]")[0].files[0]);
                }
                $.ajax({
                    url: "/admin/video-file-upload",
                    enctype: "multipart/form-data",
                    type: "POST",
                    dataType: 'json',
                    contentType : false,
                    processData : false,
                    data:formData,
                    beforeSend: function() {
                        $('#video_upload').attr('disabled', 'disabled');
                        $('#video_upload').html('Loading...');
                        //var percentage = '0';
                        //console.log(percentage);

                    },
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {

                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 80;

                                //Do something with upload progress here
                                console.log(percentComplete)
                                $('.progress .progress-bar').css("width", percentComplete+'%', function() {
                                    return $(this).attr("aria-valuenow", percentComplete) + "%";
                                })
                            }

                        }, false);

                        return xhr;

                    },
                    success: function (data) {
                        console.log(data);
                        var percentComplete = 100;
                        $('.progress .progress-bar').css("width", percentComplete+'%', function() {
                            return $(this).attr("aria-valuenow", percentComplete) + "%";
                        })
                        if(data.response){
                            var msg = data.response.message;
                        }else{
                            var msg = "No message.";
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        Toast.fire({
                            icon: 'success',
                            title: msg,
                        }).then((result) => {
                            //window.location.replace('/admin/video/'+data.video.id+'/edit');
                        });
                        $('#video_upload').attr('disabled',false);
                        $('#video_upload').html('Upload');
                    },
                    error: function (data) {
                        if(data.status == 413){
                            $('.video_file').html('File to large.')
                        }
                        $('#video_upload').attr('disabled',false);
                        $('#video_upload').html('Upload');
                        $.each(data.responseJSON.errors, function (key, item)
                        {
                            $("input[name="+key+"]").addClass('is-invalid')
                            $("label."+key).html(item);
                        });
                    }
                });
            })

            @if ($video->id)
            $('#btnSubmit').click(function(){
                var id = $("#btnSubmit").attr('data-id');
                $('label.error').html('');
                $("input").removeClass('is-invalid');
                var formData = new FormData();
                formData.append('title',$('#title').val());
                formData.append('link',$('#link').val());
                formData.append('description',$('#description').val());
                formData.append('type',$('#type').val());
                formData.append('is_activated',$('#is_activated').val());
                formData.append('published_at',$('#published_at').val());
                formData.append('source',$('#source').val());
                if( $("input[name=thumbnail]")[0].files.length != 0 ){
                    formData.append('thumbnail', $("input[name=thumbnail]")[0].files[0]);
                }
                $('#categories option:selected').each(function() {
                    formData.append("categories[]", this.value);
                });
                $('#tags option:selected').each(function() {
                    formData.append("tags[]", this.value);
                });
                $.ajax({
                    url: "/admin/video/"+id,
                    enctype: "multipart/form-data",
                    type: "POST",
                    dataType: 'json',
                    contentType : false,
                    processData : false,
                    data:formData,
                    beforeSend: function() {
                        $('#btnSubmit').attr('disabled', 'disabled');
                        $('#btnSubmit').html('Loading...');
                    },
                    success: function (data) {
                        console.log(data);
                        if(data.response){
                            var msg = data.response.message;
                        }else{
                            var msg = "No message.";
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        Toast.fire({
                            icon: 'success',
                            title: msg,
                        }).then((result) => {
                            window.location.replace('/admin/video/'+data.video.id+'/edit');
                        });

                        //$('#btnSubmit').attr('disabled',false);
                        //$('#btnSubmit').html('Update');
                    },
                    error: function (data) {
                        //console.log(data)
                        $('#btnSubmit').attr('disabled',false);
                        $('#btnSubmit').html('Update');
                        //$("input").addClass('is-invalid')
                        $.each(data.responseJSON.errors, function (key, item)
                        {
                            $("input[name="+key+"]").addClass('is-invalid')
                            $("label."+key).html(item);
                        });
                    }
                });
                // alert(id)
            })

            @else
            function store(){
                $('label.error').html('');
                $("input").removeClass('is-invalid');
                var formData = new FormData();
                formData.append('title',$('#title').val());
                formData.append('link',$('#link').val());
                formData.append('description',$('#description').val());
                formData.append('type',$('#type').val());
                formData.append('is_activated',$('#is_activated').val());
                formData.append('published_at',$('#published_at').val());
                formData.append('source',$('#source').val());
                if( $("input[name=thumbnail]")[0].files.length != 0 ){
                    formData.append('thumbnail', $("input[name=thumbnail]")[0].files[0]);
                }
                $('#categories option:selected').each(function() {
                    formData.append("categories[]", this.value);
                });
                $('#tags option:selected').each(function() {
                    formData.append("tags[]", this.value);
                });
                $.ajax({
                    url: "{{ route('admin.video.store') }}",
                    enctype: "multipart/form-data",
                    type: "POST",
                    dataType: 'json',
                    contentType : false,
                    processData : false,
                    data:formData,
                    beforeSend: function() {
                        $('#btnSubmit').attr('disabled', 'disabled');
                        $('#btnSubmit').html('Loading...');
                    },
                    success: function (data) {
                        console.log(data);
                        if(data.response){
                            var msg = data.response.message;
                        }else{
                            var msg = "No message.";
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        Toast.fire({
                            icon: 'success',
                            title: msg,
                        }).then((result) => {
                            window.location.replace('/admin/video/'+data.video.id+'/edit');
                        });
                        $('#btnSubmit').attr('disabled',false);
                        $('#btnSubmit').html('<i class="fas fa-save"></i> Save');
                    },
                    error: function (data) {
                        //console.log(data)
                        $('#btnSubmit').attr('disabled',false);
                        $('#btnSubmit').html('<i class="fas fa-save"></i> Save');
                        //$("input").addClass('is-invalid')
                        $.each(data.responseJSON.errors, function (key, item)
                        {
                            $("input[name="+key+"]").addClass('is-invalid')
                            $("label."+key).html(item);
                        });
                    }
                });
            }
            @endif
    </script>
@endsection
