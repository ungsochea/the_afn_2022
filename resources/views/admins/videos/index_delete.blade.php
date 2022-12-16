@extends('admins.layouts.app')
@section('main_title','Video Management')
@section('css')
<link rel="stylesheet" href="/admins/vendors/select2/select2.min.css">
<link rel="stylesheet" href="/admins/vendors/sweetalert2/sweetalert2.min.css">
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
    .table td img, .datepicker table td img{
        width: auto;
        height: 64px;
        border-radius: 0%;
    }
</style>
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Video Management</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <div id="get-list">
            <div class="text-center">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body" id="form_data">
          <div class="text-center">
              <div class="spinner-border text-light" role="status">
              <span class="sr-only">Loading...</span>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSubmit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
    <script src="/admins/vendors/select2/select2.min.js"></script>
    <script src="/admins/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script>
       $(function(){
            $.ajax({
                url: '/admin/video-get-ajax/?q=delete',
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    $('#get-list').html(data.html);
                },
                error: function (data) {
                    console.log(data)
                }
            });
       })
       function test(id){
        alert(id)
       }
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    //getData(page);
                    check()
                }
            }
        });
        $(document).ajaxComplete(function() {
            $('.pagina a').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    success: function(data) {
                        $('#get-list').html(data.html);
                    }
                });
            });
        });


        function destroy(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You will delete it forever!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'delete',
                        url:'/admin/video-delete/'+id,
                        success:function(data){
                            $('tr#list'+id).replaceWith(data.html);
                            if(data.video_count == 0){
                                $('tbody#result').html(' <tr id="no-data"><td colspan="9"><div class="text-center text-danger">No data</div></td></tr>');
                            }
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
                                timerProgressBar: false,
                            });
                            Toast.fire({
                                icon: 'success',
                                title: msg,
                            })

                        },
                        error: function (data) {
                            console.log(data.responseJSON)
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: data.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1200,
                                onClose:()=>{
                                    //location.reload();
                                    //$("#body_content").html('loading...').load(origin);
                                }
                            })
                        }
                    });
                }
            });
        }
        function restore(id){
            Swal.fire({
                title: 'Are you want to restore?',
                text: "It will move to all videos!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'get',
                        dataType: 'json',
                        url:'/admin/video-restore/'+id,
                        success:function(data){
                            console.log(data)
                            $('tr#list'+id).replaceWith(data.html);
                            if(data.video_count == 0){
                                $('tbody#result').html(' <tr id="no-data"><td colspan="9"><div class="text-center text-danger">No data</div></td></tr>');
                            }
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
                                timerProgressBar: false,
                            });
                            Toast.fire({
                                icon: 'success',
                                title: msg,
                            })

                        },
                        error: function (data) {
                            console.log(data.responseJSON)
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: data.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1200,
                                onClose:()=>{
                                    //location.reload();
                                    //$("#body_content").html('loading...').load(origin);
                                }
                            })
                        }
                    });
                }
            });
        }
    </script>
@endsection
