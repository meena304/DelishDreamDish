
<!-- aboutus sec of the page -->
			<section class="aboutus-sec bg-dark">
				<div class="container">
					<div class="row">
						@foreach($about as $abouts)
						<div class="col-xs-12 col-md-5 col-lg-6">
							<div class="image-block img-col" data-tilt>
								<img src="/upload/{{$abouts->image}}" class="img-responsive" alt="img-description">
							</div>
						</div>
						<div class="col-xs-12 col-md-7 col-lg-6">
							<!-- header of the page -->
							<header class="header text-center wow fadeInUp" data-wow-delay="0.4s">
								<span class="title fontpinyon">Welcome</span>
								<h1 class="heading text-uppercase" ><b>{{$abouts->heading}}</b></h1>
								<div class="header-img">
									<img src="images/bdr-img.png" alt="image description" class="img-respnsive">
								</div>
								<p>{{$abouts->dscription}}</p>
							</header>
							<!-- <span class="signature-image"><img src="images/sign.png" class="img-responsive" alt="Signature"></span> -->
						</div>
					</div>
					<div class="row contact-holder">
						<div class="col-xs-12 col-sm-4 text-center">
							<h2 class="heading2">Hotline</h2>
							<a class="sub-title" href="tell:{{$abouts->hotline}}">{{$abouts->hotline}}</a>
						</div>
						<div class="col-xs-12 col-sm-4 text-center l-bdr">
							<h2 class="heading2">We’re Open</h2>
							<time class="sub-title">{{$abouts->open_time}}</time>
						</div>
						<div class="col-xs-12 col-sm-4 text-center l-bdr">
							<h2 class="heading2">Follow Us</h2>
							<ul class="list-unstyled social-network text-center">
								<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					@endforeach
				</div>
			</section>
		