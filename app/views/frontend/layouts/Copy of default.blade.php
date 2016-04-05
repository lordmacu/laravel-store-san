<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Bootstrap
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS  
		================================================== -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/united/bootstrap.min.css">

		<style>
		@section('styles')
		body {
			padding: 10px 0;
		}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
	</head>

	<body>
		<!-- Container -->
		<div class="container">
			<!-- Navbar -->
                        
                        <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ route('home') }}"><i class="icon-home icon-white"></i> Home</a></li>
								<li {{ (Request::is('about-us') ? 'class="active"' : '') }}><a href="{{ URL::to('about-us') }}"><i class="icon-file icon-white"></i>ddd</a></li>
								<li {{ (Request::is('contact-us') ? 'class="active"' : '') }}><a href="{{ URL::to('contact-us') }}"><i class="icon-file icon-white"></i> Contact us</a></li>
					
     
   
      </ul>

      <ul class="nav navbar-nav navbar-right">
    	                                                           
        @if (Sentry::check())
        <li class="dropdown">
	<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
										Welcome, {{ Sentry::getUser()->first_name }}
										<b class="caret"></b>
									</a>
            <ul class="dropdown-menu">
 @if(Sentry::getUser()->hasAccess('admin'))
										<li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
										@endif
										<li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
										<li class="divider"></li>
										<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
          </ul>
        </li>
        
        						
        @else
        <li {{ (Request::is('auth/signin') ? 'class="active"' : '') }}><a href="{{ route('signin') }}">Sign in</a></li>
								<li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('signup') }}">Sign up</a></li>
	
        @endif
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
                        
                        
			<div class="navbar">   
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>

						<div class="nav-collapse collapse">
							<ul class="nav">
								<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ route('home') }}"><i class="icon-home icon-white"></i> Home</a></li>
								<li {{ (Request::is('about-us') ? 'class="active"' : '') }}><a href="{{ URL::to('about-us') }}"><i class="icon-file icon-white"></i> f ff</a></li>
								<li {{ (Request::is('contact-us') ? 'class="active"' : '') }}><a href="{{ URL::to('contact-us') }}"><i class="icon-file icon-white"></i> Contact us</a></li>
							</ul>

							<ul class="nav pull-right">
								@if (Sentry::check())

								<li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
									<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
										Welcome, {{ Sentry::getUser()->first_name }}
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										@if(Sentry::getUser()->hasAccess('admin'))
										<li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
										@endif
										<li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
										<li class="divider"></li>
										<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
									</ul>
								</li>
								@else
								<li {{ (Request::is('auth/signin') ? 'class="active"' : '') }}><a href="{{ route('signin') }}">Sign in</a></li>
								<li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('signup') }}">Sign up</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- Notifications -->
			@include('frontend/notifications')

			<!-- Content -->
			@yield('content')

			<hr />

			<!-- Footer -->
			<footer>
				<p>&copy; Company {{ date('Y') }}</p>
			</footer>
		</div>

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}"></script>
		<script src="{{ asset('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}"></script>
	</body>
</html>
