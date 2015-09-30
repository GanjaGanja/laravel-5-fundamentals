<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5 Fundamentals</title>

	{{-- 'Bootstrap CSS 3.3.5' + 'Select2 CSS 4.0.0' plugin + 'app.css' custom css file --}}
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/select2.min.css">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<div class="container">
		{{-- @include('partials.flash') --}}
		@include('flash::message')

		@yield('content')
	</div>

	{{-- 'JQuery' + 'Bootstrap JS 3.3.5' + 'Select2 JS 4.0.0' plugin --}}
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/select2.min.js"></script>

	<script>
		// Option 1: overlay flash messages
		$('#flash-overlay-modal').modal();

		// Option 2: simple flash messages
		// $('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

	@yield('footer')
</body>
</html>