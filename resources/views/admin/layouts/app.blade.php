<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>GeSchool</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset("assets/css/fonts.min.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link href="{{ asset('assets/styles.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/prism.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="wrapper">
		@include('admin.partials.navbar')

		@include('admin.partials.sidebar')

		<div class="main-panel">
			<div class="content">

				@yield('content')

			</div>

			@include('admin.partials.footer')
		</div>
	</div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>

	<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script>
	<script src="{{ asset('assets/prism.js') }}"></script>
	<script src="{{ asset('assets/prism-normalize-whitespace.min.js') }}"></script>
	<script src="{{ asset('assets/js/main.js')}}"></script>
	<script type="text/javascript">
	
	Prism.plugins.NormalizeWhitespace.setDefaults({
		'remove-trailing': true,
		'remove-indent': true,
		'left-trim': true,
		'right-trim': true,
	});
	
	$(document).on('click', 'a[href^="#"]', function(e) {
		var id = $(this).attr('href');

		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		e.preventDefault();

		var pos = $id.offset().top - 80;

		$('body, html').animate({scrollTop: pos});
	});
</script>
	
</body>
</html>