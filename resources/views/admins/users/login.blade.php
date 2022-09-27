{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/admins/vendors/core/core.css">
	<link rel="stylesheet" href="/admins/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="/admins/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">
				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-3 col-xl-3 col-sm-12 col-12 mx-auto">
						<div class="card">
                            <div class="row">
                                <div class="col-md-12 pl-md-0">
                                <div class="auth-form-wrapper px-5 py-5">
                                    <a href="/" class="noble-ui-logo d-block mb-2 text-center">CPL<span> Admin Login</span></a>
                                    <form class="forms-sample" id="loginForm">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="email" class="form-control" id="username" name="username" placeholder="Username">
                                            <span id="username" class="error mt-1 text-danger" for="username"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                                            <span id="password" class="error mt-1 text-danger" for="username"></span>
                                        </div>
                                        <div id="msg"></div>

                                        <div class="mt-3">
                                            <button id="loginBtn" class="btn btn-success mr-2 mb-2 mb-md-0 text-white"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="/admins/vendors/core/core.js"></script>
	<script src="/admins/vendors/feather-icons/feather.min.js"></script>
	<script src="/admins/js/template.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#loginBtn').click(function (e) {
            e.preventDefault();
            $("input").removeClass('is-invalid');
            $('span.error').html('');
            $('#msg').html('');
            $.ajax({
                data: $('#loginForm').serialize(),
                url: "/login",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $('#loginBtn').attr('disabled', 'disabled');
                    $('#loginBtn').html('Login...');
                },
                success: function (data) {
                    var msg = '<div class="alert alert-success"><span><i class="far fa-check-circle"></i> Login successfully.</span></div>';
                    $('#msg').html(msg);
                    setTimeout(function() {
                        if(data.success) {
                            location.reload();
                        }
                    }, 1000);
                },
                error: function (data) {
                    $("#loginBtn").html('<i class="fas fa-sign-in-alt"></i> Login');
                    $("#loginBtn").removeAttr('disabled');
                    $("input").addClass('is-invalid')
                    $.each(data.responseJSON.errors, function (key, item)
                    {
                        $("input[name="+key+"]").addClass('is-invalid')
                        $("span#"+key).html(item);
                    });
                    if(data.status == 500){
                        var msg = '<div class="alert alert-danger"><span><i class="fas fa-exclamation-triangle"></i> '+data.responseJSON.message+'</span></div>';
                        $('#msg').html(msg);
                    }
                }
            });
        })
    </script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Login Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/admins/vendors/core/core.css">
	<link rel="stylesheet" href="/admins/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="/admins/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="/admins/css/demo1/style.css">

  <link rel="shortcut icon" href="/admins/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper" style="background-image: url('/images/sidebar-logo.png');">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">THE-AFN <span> LOGIN</span></a>
                                    <form class="forms-sample" id="loginForm">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email address or Username</label>
                                            <input type="email" class="form-control" name="username" id="username" placeholder="Email address or Username">
                                            <span id="username" class="error mt-1 text-danger" for="username"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" placeholder="Password">
                                            <span id="password" class="error mt-1 text-danger" for="password"></span>
                                        </div>
                                        <div>
                                            <button id="loginBtn" class="btn btn-success mr-2 mb-2 mb-md-0 text-white"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="/admins/vendors/core/core.js"></script>
	<script src="/admins/vendors/feather-icons/feather.min.js"></script>
	<script src="/admins/js/template.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#loginBtn').click(function (e) {
            e.preventDefault();
            $("input").removeClass('is-invalid');
            $('span.error').html('');
            $('#msg').html('');
            $.ajax({
                data: $('#loginForm').serialize(),
                url: "/login",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $('#loginBtn').attr('disabled', 'disabled');
                    $('#loginBtn').html('Login...');
                },
                success: function (data) {
                    console.log(data)
                    var msg = '<div class="alert alert-success"><span><i class="far fa-check-circle"></i> Login successfully.</span></div>';
                    $('#msg').html(msg);
                    setTimeout(function() {
                        if(data.success) {
                            location.reload();
                        }
                    }, 1000);
                },
                error: function (data) {
                    $("#loginBtn").html('<i class="fas fa-sign-in-alt"></i> Login');
                    $("#loginBtn").removeAttr('disabled');
                    $("input").addClass('is-invalid')
                    $.each(data.responseJSON.errors, function (key, item)
                    {
                        $("input[name="+key+"]").addClass('is-invalid')
                        $("span#"+key).html(item);
                    });
                    if(data.status == 500){
                        var msg = '<div class="alert alert-danger"><span><i class="fas fa-exclamation-triangle"></i> '+data.responseJSON.message+'</span></div>';
                        $('#msg').html(msg);
                    }
                }
            });
        })
    </script>
</body>
</html>
