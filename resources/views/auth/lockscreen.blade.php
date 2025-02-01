<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body p-md-5 text-center">
					<h2 class="text-white">{{ $currentTime }}</h2>
					<h5 class="text-white">{{ $currentDate }}</h5>
					<div class="">
						<img src="{{ asset('backend/assets/images/icons/user.png') }}" class="mt-5" width="120" alt="" />
					</div>
                    @if(Auth::user()->user_role == 'admin')
                            <p class="mt-2 text-white">Admin
                            </p>
                        @endif
                        @if(Auth::user()->user_role == 'user')
                            <p class="mt-2 text-white">Admin
                            </p>
                        @endif
                        <!-- Login Form -->
					<form method="POST" action="{{ route('login') }}">
						@csrf
					<div class="mb-3 mt-3">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password"  class="form-control block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
					</div>
					<div class="d-grid">
						<button type="submit" class="btn btn-white">Login</button>
					</div>
                </form>
                <!-- End Login Form -->
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
