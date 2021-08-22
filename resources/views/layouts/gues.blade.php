<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Numero 1 du Rap, RnB, Naija Africain')">
    <meta name="author" content="">

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('titre', 'Panafrap | Rap, RnB, Naija Africain')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('website')}}/css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('website')}}/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('website')}}/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
                        @if($setting->facebook)<li><a target="_blank" href="{{  $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>@endif
                        @if($setting->twitter)<li><a target="_blank" href="{{  $setting->twitter }}" ><i class="fa fa-twitter"></i></a></li>@endif
                        @if($setting->instagram)<li><a target="_blank" href="{{  $setting->instagram }}"><i class="fa fa-instagram"></i></a></li>@endif
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="{{ route('website') }}" class="logo"><img src="{{ $setting->logo }}" alt="logo panafrap"  class="img-fluid" style="max-width: 200px; max-height: 800px; overflow:hidden;margin-left: auto"></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form action="{{route('website.search')}}" method="GET">
								<input type="get"  class="input" name="query"  placeholder="Entrer votre recherche...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
                        @foreach ($categories as $category )
                        <li><a href="{{ route('website.category', ['slug' => $category->slug])  }}">{{ $category->name }}</a></li>
                        @endforeach
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					@foreach ($categories as $category )
                        <li><a href="{{ route('website.category', ['slug' => $category->slug])  }}">{{ $category->name }}</a></li>
                        @endforeach
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>
@yield('content')
	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="{{ route('website') }}" class="logo"><img src="{{ asset($setting->logo) }}" alt="logo panafrap" style="max-width: 100px; max-height: 300px; overflow:hidden;margin-left: auto"></a>
						</div>
						<p>{!! $setting->description !!}</p>
						<ul class="contact-social">
							@if($setting->facebook)<li><a target="_blank" href="{{  $setting->facebook }}" class="social-facebook"><i class="fa fa-facebook"></i></a></li>@endif
							@if($setting->twitter)<li><a target="_blank" href="{{  $setting->twitter }}" class="social-twitter"><i class="fa fa-twitter"></i></a></li>@endif
							@if($setting->instagram)<li><a target="_blank" href="{{  $setting->instagram }}" class="social-instagram"><i class="fa fa-instagram"></i></a></li>@endif
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
						<div class="category-widget">
							<ul>
                                @foreach ($categories as $category )
                                <li><a href="{{ route('website.category', ['slug' => $category->slug])  }}">{{ $category->name }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
                                @foreach ($tags as $tag )
                                <li><a href="{{ route('website.tag', ['slug' => $tag->slug])  }}">{{ $tag->name }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">

				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="{{ route('website') }}">Home</a></li>
						<li><a href="">About Us</a></li>
						<li><a href="{{ route('website.contact') }}">Contacts</a></li>
						<li><a href="{{ route('website.about') }}">Advertise</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 {{ $setting->copyright }} | Developed by panafrap
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('website')}}/js/jquery.min.js"></script>
	<script src="{{asset('website')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('website')}}/js/jquery.stellar.min.js"></script>
	<script src="{{asset('website')}}/js/main.js"></script>

</body>

</html>
