@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    <!-- Section Slider 1 -->
    <div id="section-slider1">
        <div class="swiper-container">
          <div class="swiper-wrapper d-none">
              <!-- Item -->
              <div class="swiper-slide">
                  <div class="slider-content">
                      <div class="container">
                          <div class="row">
                              <div class="left col-12 col-sm-12 col-md-7">
                                  <h1 class="ez-animate" data-animation="fadeInLeft">Perfect app landing page for your app.</h1>
                                  <p class="ez-animate" data-animation="fadeInLeft">Purchase our premium quality complete landing page template.</p>
                                  <ul>
                                      <li><a href="#"><img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-appstore.png")}}" alt="Appcraft" data-animation="fadeInUp"></a></li>
                                      <li><a href="#"><img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-googleplay.png")}}" alt="Appcraft" data-animation="fadeInUp"></a></li>
                                  </ul>
                              </div>
                              <div class="right ez-animate col-12 col-sm-12 col-md-5" data-animation="fadeInRight">
                                  <img class="img-fluid" src="{{asset("public/assets/images/img-1.png")}}" alt="Appcraft">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.Item -->
          </div>
      </div>
    </div>
    <!-- /.Section Slider 1 -->

    
    <!-- Section Features 1 -->
	<div id="section-features1">
		<div class="container">
			<div class="row">
				<div class="left">
					<h6 class="clscheme">Checkout features</h6>
					<h2>The only app you will need</h2>
					<ul>
						<li><i class="fa fa-long-arrow-left clscheme"></i></li>
						<li><i class="fa fa-long-arrow-right clscheme"></i></li>
					</ul>
				</div>
				<div class="right">
					<div class="swiper-container features1">
						<div class="swiper-wrapper">
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon1.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon2.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon3.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon1.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon2.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{asset("public/assets/images/img-icon3.png")}}" alt="Appcraft">
									<h3>Free Caliing Service</h3>
									<p>Direct mailing research development buyer iPad validation startup social proof learning curve user experience analytics</p>
								</div>
							</div>
							<!-- /.Item -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Features 1 -->
    <!-- Features Wrap -->
	<div class="features-wrap">
		<!-- Section Features 2 -->
		<div id="section-features2">
			<div class="container">
				<div class="row">
					<div class="left col-sm-12 col-md-6">
						<div class="img-container">
							<img class="circleicon1 ez-animate" src="{{asset("public/assets/images/img-circleicon1.png")}}" alt="Appcraft" data-animation="fadeInUp">
							<img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-2.png")}}" alt="Appcraft" data-animation="fadeInLeft">
						</div>
					</div>
					<div class="right my-auto col-sm-12 col-md-6">
						<h6 class="clscheme">01 – Add new task</h6>
						<h2>Everything starts with the task</h2>
						<p>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form, by injected humour lorem ipsum is simply free text in the</p>
						<a href="#" class="btn-2 shadow1 style3 bgscheme">GET STARTED NOW</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Section Features 2 -->
		<!-- Section Features 2 -->
		<div class="section-features2">
			<div class="container">
				<div class="row">
					<div class="right my-auto col-sm-12 col-md-6">
						<h6 class="clscheme">01 – Add new task</h6>
						<h2>Everything starts with the task</h2>
						<p>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form, by injected humour lorem ipsum is simply free text in the</p>
						<a href="#" class="btn-2 shadow1 style3 bgscheme">GET STARTED NOW</a>
					</div>
					<div class="left col-sm-12 col-md-6">
						<div class="img-container">
							<img class="circleicon1 ez-animate" src="{{asset("public/assets/images/img-circleicon2.png")}}" alt="Appcraft" data-animation="fadeInUp">
							<img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-3.png")}}" alt="Appcraft" data-animation="fadeInRight">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Section Features 2 -->
	</div>
	<!-- /.Features Wrap -->
    <!-- Section APP Screen 1 -->
	<div id="section-appscreen1">
		<div class="container">
			<div class="row">
				<div class="title1 col-12">
					<h6 class="clscheme">APP SCREEN</h6>
					<h2>How our app looks like</h2>
				</div>
			</div>
		</div>
		<div class="container appscreen1">
			<div class="row">
				<div class="owl-carousel owl-theme">
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen1.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen2.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen3.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen4.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen5.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen1.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen1.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen2.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen3.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img class="img-fluid" src="{{asset("public/assets/images/img-screen4.jpg")}}" alt="Appcraft">
					</div>
					<!-- /.Item -->
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
	<!-- /.Section APP Sreen 1 -->
    
    <!-- Section Testimonial 1 -->
	<div id="section-testimonial1">
		<div class="container">
			<div class="row">
				<div class="title1 col-12">
					<h6 class="clscheme">USER REVIEWS</h6>
					<h2>What users say about us</h2>
				</div>
			</div>
		</div>
		<div class="container testimonial1">
			<img class="img-fluid bg-testimonial" src="{{asset("public/assets/images/bg-testimonial1.jpg")}}" alt="Appcraft">
			<div class="row">
				<div class="owl-carousel owl-theme">
					<!-- Item -->
					<div class="item">
						<img src="{{asset("public/assets/images/img-testimonial1.png")}}" alt="Appcraft">
						<h3>Arya Stark</h3>
						<h4>Client</h4>
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<p>As part of the classes I teach, I task my students with preparing a lot of presentations. To save time & reduce boredom, I occasionally have only a pick who presents the good work!</p>
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img src="{{asset("public/assets/images/img-testimonial2.png")}}" alt="Appcraft">
						<h3>Arya Stark</h3>
						<h4>Client</h4>
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<p>As part of the classes I teach, I task my students with preparing a lot of presentations. To save time & reduce boredom, I occasionally have only a pick who presents the good work!</p>
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img src="{{asset("public/assets/images/img-testimonial3.png")}}" alt="Appcraft">
						<h3>Arya Stark</h3>
						<h4>Client</h4>
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<p>As part of the classes I teach, I task my students with preparing a lot of presentations. To save time & reduce boredom, I occasionally have only a pick who presents the good work!</p>
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img src="{{asset("public/assets/images/img-testimonial1.png")}}" alt="Appcraft">
						<h3>Arya Stark</h3>
						<h4>Client</h4>
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<p>As part of the classes I teach, I task my students with preparing a lot of presentations. To save time & reduce boredom, I occasionally have only a pick who presents the good work!</p>
					</div>
					<!-- /.Item -->
					<!-- Item -->
					<div class="item">
						<img src="{{asset("public/assets/images/img-testimonial2.png")}}" alt="Appcraft">
						<h3>Arya Stark</h3>
						<h4>Client</h4>
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<p>As part of the classes I teach, I task my students with preparing a lot of presentations. To save time & reduce boredom, I occasionally have only a pick who presents the good work!</p>
					</div>
					<!-- /.Item -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Testimonial 1 -->
    <!-- Section Subscribe 1 -->
	<div id="section-subscribe1">
		<div class="container">
			<div class="row">
				<div class="title1 col-12">
					<h6 class="clscheme">NEWSLETTER</h6>
					<h2>Subscribe to our newsletter</h2>
					@include('includes.partials.messages')
				</div>
				
				<div class="form col-12 ez-animate" data-animation="fadeInUp">
					{{ html()->form('POST', route('subscribe'))->open() }}
					<form action="{{route('subscribe')}}" id="SubscribeForm">
						<input type="email" name="email" placeholder="Enter your email address" required="">
						<button type="submit" class="shadow1 bgscheme">SUBSCRIBE NOW</button>
					{{ html()->form()->close() }}
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Subscribe 1 -->
    <!-- Section Download 1 -->
	<div id="section-download1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Download Today</h1>
					<p>and get started with a free 1 month trial for your business</p>
					<ul>
						<li>
							<a href="#">
								<img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-appstore.png")}}" alt="Appcraft" data-animation="fadeInUp">
							</a>
						</li>
						<li>
							<a href="#">
								<img class="img-fluid ez-animate" src="{{asset("public/assets/images/img-googleplay.png")}}" alt="Appcraft" data-animation="fadeInUp">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Download 1 -->

@endsection
