<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5 Fundamentals</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	{{-- Turned off app.css because of problems with flash notifications --}}
	{{-- <link rel="stylesheet" href="/css/app.css"> --}}
</head>
<body>
	<div class="container">
		{{-- @include('partials.flash') --}}
		@include('flash::message')

		@yield('content')
	</div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
		// Option 1: overlay flash messages
		$('#flash-overlay-modal').modal();

		// Option 2: simple flash messages
		// $('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

	@yield('footer')
</body>
</html>