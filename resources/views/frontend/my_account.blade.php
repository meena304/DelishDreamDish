@extends('frontend.master')
@section('tittle', 'My Account')

@section('content')
<div class="space bg-black"></div>
<!-- banner of the page -->
			<section class="banner bg-parallax overlay" style="background-image:url(/upload/account3.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">Account</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="index.html">Home</a></li>
								<li>/</li>
								<li>Account</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Checkout Sec of the page -->
            <section >
	            <div class="container" style="color:white;">
		            <h1>Your Account</h1>
		            <hr>
		            <br>
		            <div class="row">
			            <div class="col-md-6">
			                <a href="{{url('address')}}">
					            <div class="row">
						            <div class="col-md-3">
							            <i class="fas fa-map-marker-alt"  style="font-size: 74px;margin: 16px 59px"></i>
						            </div>
						            <div class="col-md-9">
							            <h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
                                            Your Addresses
                                        </h2>
                                        <div><span class="a-color-secondary">Edit addresses for orders and gifts</span></div>
                                    </div>
                                </div>
                            </a>
                        </div>   
                    

                        <div class="col-md-6" style="border:white;">
                        	<a href="{{url('orders')}}">
					            <div class="row">
						            <div class="col-md-3">
							            
							            <i class="fas fa-store" style="font-size:70px; margin: 21px 45px;"></i>
						            </div>
						            <div class="col-md-9">
							            <h2>
                                            Your Orders
                                        </h2>
                                        <div><span class="a-color-secondary">Edit addresses for orders and gifts</span></div>
                                    </div>
            
                                </div>   
                            </a>
                        </div>
                    </div>
	            </div>
            </section>
            <br><br>

@endsection