<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
	<link rel="stylesheet" href="/admins/vendors/core/core.css">
	<link rel="stylesheet" href="/admins/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="/admins/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="/admins/css/demo1/style.css">
    <link rel="shortcut icon" href="/images/favicon.png" />
    @yield('css')
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:../../partials/_sidebar.html -->
		@include('admins.includes.sidebar')

		<div class="page-wrapper">
			@include('admins.includes.navbar')
			<div class="page-content">
                @yield('content')
			</div>
			@include('admins.includes.footer')
		</div>
	</div>

	<script src="/admins/vendors/core/core.js"></script>
	<script src="/admins/vendors/feather-icons/feather.min.js"></script>
	<script src="/admins/js/template.js"></script>
    @yield('js')
</body>
</html>
