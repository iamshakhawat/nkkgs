<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/img/favicon.png">

	<link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
	<!--[if lt IE 9]>
		<script src="{{ asset('backend') }}/assets/js/html5shiv.min.js"></script>
		<script src="{{ asset('backend') }}/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="main-wrapper">
		<div class="account-page">
			<div class="container">
				<h3 class="account-title text-white">Login</h3>
				<div class="account-box">
					<div class="account-wrapper">
						<div class="account-logo">
							<a href="index.html"><img src="{{ asset('backend') }}/assets/img/logo.png" alt="SchoolAdmin"></a>
						</div>
						<form action="{{ route('loginPost') }}" method="POST">
							@csrf
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" autocomplete="false" class="form-control">
								@error('email')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" autocomplete="false" name="password" class="form-control">
								@error('password')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Remember me</label>
							  </div>
							

							<div class="form-group text-center custom-mt-form-group">
								<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
							</div>
							<div class="text-center">
								<a href="#">Forgot your password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('backend') }}/assets/js/jquery-3.6.0.min.js"></script>

	<script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>

	<script src="{{ asset('backend') }}/assets/js/jquery.slimscroll.js"></script>

	<script src="{{ asset('backend') }}/assets/js/app.js"></script>
</body>

</html>