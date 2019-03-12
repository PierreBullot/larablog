<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Foundation | Welcome</title>
		<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	</head>
	<body>
		<div class="top-bar">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="menu-text">Menu:</li>
					<li><a href="/">Home</a></li>
					<li><a href="/articles">Articles</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@guest
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>
	
							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a>
	
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endguest
				</ul>
			</div>
		</div>
		
		<div class="callout large primary">
			<div class="row column text-center">
				<h1>Our Blog</h1>
				<h2 class="subheader">Such a Simple Blog Layout</h2>
			</div>
		</div>
		
		<div class="row medium-8 large-7 columns">
			@yield('content')
		</div>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>
