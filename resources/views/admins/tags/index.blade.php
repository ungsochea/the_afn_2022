@extends('admins.layouts.app')
@section('main_title','Tag Management')
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
</style>
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Tag Management</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <button type="button" onclick="create()" class="btn btn-success">Add</button>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Type search" aria-label="Input group example" aria-describedby="btnGroupAddon">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-search"></i></div>
                    </div>
                </div>
            </div>
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
                url: '/admin/tag-get-ajax',
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
        function create(){
            $('#modalForm').modal('toggle');
            $('h5.modal-title').html('Add');
            $('button#btnSubmit').html('Add');
            $.ajax({
                url: "/admin/tag/create",
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    $("#form_data").empty().html(data.html);
                    $("button#btnSubmit").attr("onclick",'store()')
                    $('select#is_activated').select2({placeholder: "Select Status",dropdownParent: $('#modalForm')});
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
        function store(){
            $('input').removeClass('is-invalid');
            $("label.error").html('');
            $.ajax({
                data: $('#dataForm').serialize(),
                url: '/admin/tag',
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $('#btnSubmit').attr('disabled', 'disabled');
                    $('#btnSubmit').html('Loading...');
                },
                success: function (data) {

                    $("#btnSubmit").html('Add');
                    $("#btnSubmit").removeAttr('disabled');
                    $('tbody#result').prepend(data.html);
                    $('#modalForm').modal('toggle');
                    $('#no-data').remove();

                    if(data.response){
                        var msg = data.response.message;
                    }else{
                        var msg = "No message.";
                    }
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: false,
                    });
                    Toast.fire({
                        icon: 'success',
                        title: msg,
                    })
                },
                error: function (data) {
                    $("#btnSubmit").html('Add');
                    $("#btnSubmit").removeAttr('disabled');
                    $.each(data.responseJSON.errors, function (key, item)
                    {
                        $("input[name="+key+"]").addClass('is-invalid')
                        $("label."+key).html(item);
                    });
                }
            });
        }
        function edit(id){
            $('#modalForm').modal('toggle');
            $('h5.modal-title').html('Update');
            $('button#btnSubmit').html('Update');
            $.ajax({
                url: '/admin/tag/'+id+'/edit',
                type: "GET",
                dataType: 'json',
                beforeSend: function() {
                    $('#form_data').html('Loading...');
                },
                success: function (data) {
                    $("#form_data").empty().html(data.html);
                    $("button#btnSubmit").attr("onclick",'update('+id+')');
                    $('select#is_activated').select2({placeholder: "Select Status",dropdownParent: $('#modalForm')});
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
        function update(id){
            $.ajax({
                data: $('#dataForm').serialize(),
                url: '/admin/tag/'+id,
                type: "PUT",
                dataType: 'json',
                beforeSend: function() {
                    $('#loginBtn').attr('disabled', 'disabled');
                    $('#loginBtn').html('Loading...');
                },
                success: function (data) {
                    $('tr#list'+id).replaceWith(data.html);
                    $('#modalForm').modal('toggle');
                    $("#btnSubmit").html('Update');
                    $("#btnSubmit").removeAttr('disabled');


                    if(data.response){
                        var msg = data.response.message;
                    }else{
                        var msg = "No message.";
                    }
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: false,
                    });
                    Toast.fire({
                        icon: 'success',
                        title: msg,
                    })
                },
                error: function (data) {
                    $("#btnSubmit").html('Update');
                    $("#btnSubmit").removeAttr('disabled');
                    $.each(data.responseJSON.errors, function (key, item)
                    {
                        $("input[name="+key+"]").addClass('is-invalid')
                        $("label."+key).html(item);
                    });
                }
            });
        }
        function destroy(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'delete',
                        url:'/admin/tag/'+id,
                        success:function(data){
                            $('tr#list'+id).replaceWith(data.html);
                            if(data.tag_count == 0){
                                $('tbody#result').html(' <tr id="no-data"><td colspan="4"><div class="text-center text-danger">No data</div></td></tr>');
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
                                timer: 2000,
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
        $('#search').keyup(function(e){
            e.preventDefault()
            var search = $("#search").val();
            $.ajax({
                data: {search:search},
                url: "/admin/tag-search",
                type: "get",
                dataType: 'json',
                success: function (data) {
                    $("#get-list").empty().html(data.html);
                },
                error: function (data) {
                   console.log(data);
                }
            });
        });
        $("#modalForm").on("hidden.bs.modal", function () {
            $('#modalForm form')[0].reset();
        });
    </script>
@endsection
