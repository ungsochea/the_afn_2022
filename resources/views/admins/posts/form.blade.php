@extends('admins.layouts.app')
@section('main_title',$post->id ? 'Update Post' : 'Add Post')
@section('css')
    <link rel="stylesheet" href="/admins/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/admins/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/admins/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/admins/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
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
      <h4 class="mb-3 mb-md-0">{{ $post->id ? 'Update Post' : 'Add Post'}}</h4>
    </div>
</div>
<form class="row mb-3">
    <div class="col-sm-9 stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="mb-1">
                <label for="title" class="form-label">Title Post <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $post->title ?? ''}}">
                <label id="title-error" class="error text-danger title" for="title"></label>
            </div>
            <div class="mb-1">
                <label for="slug" class="form-label">Slug Post <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug" value="{{ $post->slug ?? ''}}">
                <label id="slug-error" class="error text-danger slug" for="slug"></label>
            </div>
            <div class="mb-1">
                <label for="slug" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $post->description ?? ''}}</textarea>
                <label id="description-error" class="error text-danger description" for="description"></label>
            </div>
            <div class="mb-1">
                <label for="body" class="form-label">Body <span class="text-danger">*</span></label>
                <textarea class="form-control" name="body" id="content_body" cols="30" rows="5">{{ $post->body ?? ''}}</textarea>
                <label id="body-error" class="error text-danger body" for="body"></label>
            </div>
        </div>
      </div>
    </div>
    <div class="col-sm-3 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="mb-0">
                <label for="published_at" class="form-label">Published At <span class="text-danger">*</span></label>
                <div class="input-append date datepicker form_datetime">
                    <input class="form-control" type="text" value="{{ $post->published_at ?? ''}}" value="{{ $post->published_at ?? ''}}" id="published_at" name="published_at" placeholder="Set time">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
                <label id="published_at-error" class="error text-danger published_at" for="published_at"></label>
            </div>
            <div class="mb-3">
                <label for="is_activated" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select" id="is_activated" name="is_activated">
                    @foreach (PostStatus() as $value => $key)
                    <option value="{{ $value }}" {{ $post->is_activated == $value ? 'selected' : ''}}>{{ $key}}</option>
                    @endforeach
                </select>
                <label id="is_activated-error" class="error text-danger is_activated" for="is_activated"></label>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-select" id="categories" name="categories" multiple>
                    {{-- @foreach ($post->categories as $category)
                    <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
                    @endforeach --}}
                </select>
                <label id="category_id-error" class="error text-danger category_id" for="category_id"></label>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tag <span class="text-danger">*</span></label>
                <select class="form-select" id="tags" name="tags" multiple>
                    {{-- @foreach ($post->tags as $tag)
                    <option value="{{ $tag->id }}" selected="selected">{{ $tag->title }}</option>
                    @endforeach --}}
                </select>
                <label id="tag_id-error" class="error text-danger tag_id" for="tag_id"></label>
            </div>
            <div class="mb-3">
                <label for="image_thumbnail" class="form-label">Thumbnail Image <span class="text-danger">*</span></label>
                <div class="form-group">
                    <div class="main-img-preview">
                        <img class="thumbnail img-preview" src=" {{ $post->id ? $post->thumbnail_m : '/images/post_thumbnail.png'}}" title="Preview Logo" width="150">
                    </div>
                    <div class="input-group">
                        <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                        <div class="input-group-btn">
                            <div class="fileUpload btn btn-danger fake-shadow">
                                <span><i class="glyphicon glyphicon-upload"></i> Choose file</span>
                                <input id="logo-id" name="image_thumbnail" type="file" accept="image/*" class="attachment_upload">
                            </div>
                        </div>
                    </div>
                </div>
                <label id="image_thumbnail-error" class="error text-danger image_thumbnail" for="image_thumbnail"></label>
            </div>
          </div>
        </div>
      </div>
</form>
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.post.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back</a>
        <button type="button" id="btnSubmit" class="btn btn-success" onclick="{{ $post->id ? 'update('.$post->id.')':'store()'}}"><i class="fas fa-save"></i> {{ $post->id ? 'Update' : 'Save'}}</button>
    </div>
</div>
@endsection
@section('js')
    <script src="/admins/vendors/tinymce/tinymce.min.js"></script>
    <script src="/admins/vendors/select2/select2.min.js"></script>
    <script src="/admins/vendors/moment/moment.min.js"></script>
    <script src="/admins/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
    <script src="/admins/vendors/sweetalert2/sweetalert2.min.js"></script>

    <script>
            var editor_config = {
                path_absolute : "/",
                selector: 'textarea#content_body',
                relative_urls: false,
                height: 700,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback : function(callback, value, meta) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                  if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }
                  tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                      callback(message.content);
                    }
                  });
                }
              };
              tinymce.init(editor_config);
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
            @if ($post->id)
            function update(id){
                $('label.error').html('');
                $("input").removeClass('is-invalid');
                var formData = new FormData();
                formData.append('title',$('#title').val());
                formData.append('slug',$('#slug').val());
                formData.append('description',$('#description').val());
                formData.append('body',tinymce.get('content_body').getContent());
                formData.append('is_activated',$('#is_activated').val());
                formData.append('published_at',$('#published_at').val());
                if( $("input[name=image_thumbnail]")[0].files.length != 0 ){
                    formData.append('image_thumbnail', $("input[name=image_thumbnail]")[0].files[0]);
                }
                $('#categories option:selected').each(function() {
                    formData.append("categories[]", this.value);
                });
                $('#tags option:selected').each(function() {
                    formData.append("tags[]", this.value);
                });
                $.ajax({
                    url: "/admin/post/"+id,
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
                        Swal.fire({
                            text:  msg,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //location.reload();
                                window.location.replace('/admin/post/'+data.post.id+'/edit');
                            }
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
            @else
            function store(){
                $('label.error').html('');
                $("input").removeClass('is-invalid');
                var formData = new FormData();
                formData.append('title',$('#title').val());
                formData.append('slug',$('#slug').val());
                formData.append('description',$('#description').val());
                formData.append('body',tinymce.get('content_body').getContent());
                formData.append('is_activated',$('#is_activated').val());
                formData.append('published_at',$('#published_at').val());
                if( $("input[name=image_thumbnail]")[0].files.length != 0 ){
                    formData.append('image_thumbnail', $("input[name=image_thumbnail]")[0].files[0]);
                }
                $('#categories option:selected').each(function() {
                    formData.append("categories[]", this.value);
                });
                $('#tags option:selected').each(function() {
                    formData.append("tags[]", this.value);
                });
                $.ajax({
                    url: "{{ route('admin.post.store') }}",
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
                        //console.log(data);
                        if(data.response){
                            var msg = data.response.message;
                        }else{
                            var msg = "No message.";
                        }
                        Swal.fire({
                            text:  msg,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //location.reload();
                                window.location.replace('/admin/post/'+data.post.id+'/edit');
                            }
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
