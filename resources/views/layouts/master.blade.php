<!doctype html>
<html lang="en">
<head>
@include('includes.head')
</head>

<body>
<div>

		<header class="row">
			@include('includes.header')
		</header>
	<div class="container">
		<!-- start main section -->
		@yield('content')
	</div> <!-- end of container -->
</div>
</body>
</html>