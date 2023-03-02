<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Eliana-consult</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Home_Assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home_Assets/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('Home_Assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home_Assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home_Assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('Home_Assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('Home_Assets/css/ionicons.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('Home_Assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Home_Assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('Home_Assets/css/style.css')}}">
  </head>
  
  <body>
  @include('sweetalert::alert')
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="#section-counter" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="#services-section" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="{{route('register')}}" class="nav-link">Get Started</a></li>
	          <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url({{asset('Home_Assets/images/bg_1.jpg')}})">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mb-md-5">
          	<span class="subheading">{{config('app.name')}}</span>
            <h1 class="mb-4">Welcome to Eliana-consult</h1>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Our Services</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url({{asset('Home_Assets/images/bg_2.jpg')}})">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mb-md-5">
          	<span class="subheading">{{config('app.name)')}}</span>
            <h1 class="mb-4">We Help to Grow Your Business</h1>
            <p><a href="#services-section" class="btn btn-primary px-4 py-3 mt-3">Our Services</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-consult" id="services-section">
			<div class="container">
				<div class="row d-flex no-gutters align-items-stretch consult-wrap">
					<div class="col-md-5 wrap-about align-items-stretch d-flex">
						<div class="ftco-animate bg-primary align-self-stretch px-4 py-5 w-100">
							<h2 class="heading-white mb-4">Request a Service</h2>
							<form action="{{route('account.referSomeone_public')}}" method="POST" enctype="multipart/form-data">
		    				@csrf
							<div class="form-group">
		    					<input type="text" class="form-control" name="client_name" placeholder="Enter Name" class="@error('client_name') is-invalid @enderror">
		    				</div>
                            @error('client_required_service')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
		    				

<div class="form-group">
		    					<input type="text" class="form-control" name="client_email" placeholder="Enter Email" class="@error('client_email') is-invalid @enderror">
		    				</div>
                            @error('client_email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
		    					<input type="text" class="form-control" name="client_phone" placeholder="Enter Phone" class="@error('client_phone') is-invalid @enderror">
		    				</div>
                            @error('client_phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
		    					<input type="text" class="form-control" name="client_address" placeholder="Enter Address" class="@error('client_address') is-invalid @enderror">
		    				</div>
                            @error('client_address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
		    					

	    					<div class="form-group">
		    					<div class="form-field">
	        					<div class="select-wrap">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        @php    

$services = \App\Models\CompanyCategory::get();

@endphp
<select name="client_required_service" class="form-control" name="client_required_service" class="@error('client_required_service') is-invalid @enderror">
<option value="">Select Service Type</option>
      @foreach($services as $service)
      <option value="{{$service->category_name}}">{{$service->category_name}}</option>
     @endforeach
     </select>
	                  </div>
		              </div>
		    				</div>
	    					
                            <div class="form-group">
    <label for="Attachment (Optional)" style="color: white;">Attachment (Optional)</label>
    <input type="file" class="form-control" name="attachment" class="@error('attachment') is-invalid @enderror">
  </div>

  @error('attachment')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
		            <div class="form-group">
		              <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">
		            </div>
		    			</form>
						</div>
					</div>
				</div>
				<br>
					<div class="col-md-7 wrap-about ftco-animate align-items-stretch d-flex">
						<div class="bg-white p-5">
							<h2 class="mb-4">Eliana-consult<br></h2>
							<div class="row">
								<div class="col-lg-6">
									<div class="services">
										<div class="icon mt-2 d-flex align-items-center"><span class="flaticon-collaboration"></span></div>
										<div class="text media-body">
											<h3>Taxation </h3>
											<p>Efficient tax planning, aims in making the process as efficient as possible.</p>
										</div>
									</div>
									<div class="services">
										<div class="icon mt-2"><span class="flaticon-analysis"></span></div>
										<div class="text media-body">
											<h3>Audit</h3>
											<p>Advisory in Internal Audits and Statutory Audits.</p>
										</div>
									</div>
								</div>


								<div class="col-lg-6">
									<div class="services">
										<div class="icon mt-2"><span class="flaticon-search-engine"></span></div>
										<div class="text media-body">
											<h3>Other Statutory</h3>
											<p>PAYEE, NAPSA and NHIMA returns and registration.</p>
										</div>
									</div>
									<div class="services">
										<div class="icon mt-2"><span class="flaticon-handshake"></span></div>
										<div class="text media-body">
											<h3>Investment Planning</h3>
											<p>provides investment products, advice, and/or planning to investors.</p>
										</div>
									</div>
								</div>							
							</div>



							
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-intro ftco-no-pb img" style="background-image: url({{asset('Home_Assets/images/bg_3.jpg')}})">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-0">You Always Get the Best Guidance</h2>
          </div>
        </div>	
    	</div>
    </section>

    <section class="ftco-section ftco-about ftco-no-pt ftco-no-pb ftco-counter" id="section-counter">
			<div class="container consult-wrap">
				<div class="row d-flex align-items-stretch">
					<div class="col-md-6 wrap-about align-items-stretch d-flex">
						<div class="img" style="background-image: url({{asset('Home_Assets/images/about.jpg')}})"></div>
					</div>
					<div class="col-md-6 wrap-about ftco-animate py-md-5 pl-md-5">
						<div class="heading-section mb-4">
							<span class="subheading">Welcome to {{config('app.name)')}}</span>
							<h2>The Smartest Thing To Do With Your Consulting Business</h2>
						</div>
						<p>About us.</p>
						<div class="tabulation-2 mt-4">
							<ul class="nav nav-pills nav-fill d-md-flex d-block">
							  <li class="nav-item">
							    <a class="nav-link active py-2" data-toggle="tab" href="#home1"><span class="ion-ios-home mr-2"></span> Our Mission</a>
							  </li>
							  <li class="nav-item px-lg-2">
							    <a class="nav-link py-2" data-toggle="tab" href="#home2"><span class="ion-ios-person mr-2"></span> Our Vision</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link py-2" data-toggle="tab" href="#home3"><span class="ion-ios-mail mr-2"></span> Our Value</a>
							  </li>
							</ul>
							<div class="tab-content bg-light rounded mt-2">
							  <div class="tab-pane container p-0 active" id="home1">
							  	<p>To help customers achieve their business objectives by providing innovative, best-in-class consulting, Human resource and management services.</p>
							  </div>
							  <div class="tab-pane container p-0 fade" id="home2">
							  	<p>Deliver high-end specialized management consultancies services that are fit for purpose and designed to add value to our clients.</p>
							  </div>
							  <div class="tab-pane container p-0 fade" id="home3">
							  	<p>We strictly adhere to the core values of our organization that allow us to serve our clients in the best possible way.</p>
							  </div>
							</div>
						</div>
    				


					</div>
				</div>
			</div>
		</section>
	<br><br><br>	
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">24/27 Manchinchi road, Lusaka, Zambia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+260977787578</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@elianaconsult.com</span></a></li>
	              </ul>
	            </div>
	            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
			  <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="#section-counter" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="#services-section" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="{{route('register')}}" class="nav-link">Get Started</a></li>
	          <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset('Home_Assets/images/image_1.jpg')}})"></a>
               
              </div>
             
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Eliana-consult. All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://elianaconnect.com" target="_blank">Eliana-connect</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('Home_Assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/popper.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/aos.js')}}"></script>
  <script src="{{asset('Home_Assets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('Home_Assets/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('Home_Assets/js/google-map.js')}}"></script>
  <script src="{{asset('Home_Assets/js/main.js')}}"></script>
    
  </body>
</html>