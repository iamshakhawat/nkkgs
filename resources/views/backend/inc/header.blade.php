

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title','Admin')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/img/favicon.png">

	<link href="{{ asset('backend') }}/assets/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/fullcalendar.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/morris/morris.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
	<script src="{{ asset('backend') }}/assets/js/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/toastr.min.css">
	<script src="{{ asset('backend') }}/assets/js/toastr.min.js"></script>



	<!--[if lt IE 9]>
		<script src="{{ asset('backend') }}/assets/js/html5shiv.min.js"></script>
		<script src="{{ asset('backend') }}/assets/js/respond.min.js"></script>
	<![endif]-->

	<script>
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
	</script>

</head>

<body>

	<div class="main-wrapper">

		<div class="header-outer">
			@include('backend.inc.navbar')
		</div>