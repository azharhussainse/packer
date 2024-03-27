<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <!-- Uniocde -->
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <![endif]-->
        <!-- First Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Pgae Description -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Starter')">
        <meta name="author" content="@yield('meta_author', 'haider8278')">
        <!-- Favicon -->
        <link rel="shortcut icon" href="public/assets/images/logo.png">
        <!-- Bootstrap 4 -->
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!--Bootstrap CSS-->
        {{ style('public/css/frontend.css') }}
        {{ style('public/assets/css/jquery-ui.css') }}
        {{ style('public/assets/css/emojionearea.min.css') }}
        {{ style('public/assets/css/swiper.min.css') }}
        {{ style('public/assets/css/owl.carousel.min.css') }}
        {{ style('public/assets/css/owl.theme.default.min.css') }}
        {{ style('public/assets/css/animate.min.css') }}

        <link rel="stylesheet" href="{{asset("public/assets/css/style.css")}}">

        @stack('after-styles')
        @if(request()->route()->getName() != 'frontend.index')
        <style>
            .navbar-1{
                position: relative;
            }
            .navbar-1 .navbar-nav .nav-item .nav-link {
                color: var(--dark);
            }
            .footer-nav li{
                list-style-type:none;
                padding: 5px 10px;
            }
            .footer-nav li a{
                color:#fff;
                transition: 0.6s all;
            }
            .footer-nav li a:hover{
                color:#000;
            }
            #section-preloader{
                dislay:none !important;
            }
        </style>
        @endif
    </head>

    <body class="scheme2">
        <div id="app"></div>

        <!-- Color Switcher -->
        <div id="color-switcher" class="closed">
            <div class="switcher-panel">
                <i class="fas fa-cog fa-spin"></i>
            </div>
            <div class="switcher-header">
                <h3>Skin Colors</h3>
            </div>
            <div class="switcher-content">
                <div class="list-color">
                    <span class="scheme1 "></span>
                    <span class="scheme2  active"></span>
                    <span class="scheme3"></span>
                    <span class="scheme4"></span>
                </div>
            </div>
            <div class="switcher-footer">
                <h6>Choose a color with click the predefined styles above.</h6>
                <p>© Copyrights PuriCreative.</p>
            </div>
        </div>
        <!-- /.Color Switcher -->
        {{-- @include('includes.partials.messages') --}}
        @include('frontend.includes.nav')
        @yield('content')


        <!-- Section Footer -->
	<div id="section-footer">
		<div class="container">
			<div class="footer-widget">
				<div class="row">
					<div class="left col-md-3">
						<a href="index.html"><img src="{{asset("public/assets/images/logo.png")}}" alt="Appcraft"></a>
					</div>
                    <div class="col-md-3">
                        <ul class="footer-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="/requests">Search</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/faqs">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="footer-nav">
                            <li><a href="/">Privacy Policy</a></li>
                            <li><a href="/">Terms & Conditions</a></li>
                        </ul>
                    </div>
					<div class="right col-md-3">
						<div class="social-links">
			                <a href="#"><i class="fab fa-google-plus fa-lg"></i></a>
			                <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
			                <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
			                <a href="#"><i class="fab fa-behance fa-lg"></i></a>
			            </div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright container-fluid p-2">
			<div class="col-12">
				<p>© 2019 Copyrights <a href="#">ShipEarn</a></p>
			</div>
		</div>
	</div>
	<!-- /.Section Footer -->
        <!-- Scripts -->
        @stack('before-scripts')

        {!! script('public/js/manifest.js') !!}
        {!! script('public/js/vendor.js') !!}
        {!! script('public/js/frontend.js') !!}
        {!! script('public/assets/js/jquery-ui.js') !!}
        {!! script('public/assets/js/emojionearea.min.js') !!}
        {!! script('public/assets/js/swiper.min.js') !!}
        {!! script('public/assets/js/owl.carousel.min.js') !!}
        {!! script('public/assets/js/jquery.waypoints.min.js') !!}
        {!! script('public/assets/js/easy-waypoint-animate.js') !!}
        {!! script('public/assets/js/scripts.js') !!}
        {!! script('public/assets/js/carousel-features1.js') !!}
        {!! script('public/assets/js/carousel-appscreen1.js') !!}
        {!! script('public/assets/js/carousel-testimonial1.js') !!}

        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
