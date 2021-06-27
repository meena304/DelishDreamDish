@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')

		<div class="search-holder">
		@if(session('message'))
    <p class="alert alert-success w-50 h-15 m-auto">
    	{{session('message')}}
    </p>
    @endif
			<form action="javascript:void(0);" class="select-form">
				<fieldset>
					<select>
						<option value="0">ALL CATEGORIES</option>
						<option value="1">ALL CATEGORIES</option>
						<option value="2">ALL CATEGORIES</option>
					</select>
					<input type="search" class="form-control fwNormal bdr" placeholder="Search">
					<button type="submit" class="sub-btn"><i class="fa fa-search"></i></button>
				</fieldset>
			</form>
			<a href="javascript:void(0);" class="search-opener icon"><i class="fa fa-times"></i></a></li>
		</div>
		
		<main id="main">
			<div class="space bg-black"></div>
			<!-- banner of the page -->
			<section class="banner bg-parallax " style="background-image:url(https://images.unsplash.com/photo-1579617487912-9076f1db97d5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHJlc3RhdXJhbnQlMjBoZHxlbnwwfDB8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60);">
				<div class="container">
					<div class="row">
						
					</div>
				</div>
			</section>
			<!-- shop detail of the page -->
			<section class="shop-detail container">
				<div class="row">
					<div class="col-xs-12">
						<div class="slider">
							<!-- product slider of the page -->
							<div class="product-slider">
								<div class="slide ">
									<img src="/upload/{{$dish->dish_image}}" class="img-responsive " alt="image description" style="width: 750px; height: 450px">
								</div>
								@foreach($dish_image as $image)
								@if($dish->dish_id==$image->dish_id)
								<div class="slide">
									<img src="/upload/{{$image->image}}" class="img-responsive" alt="image description" style="width: 750px; height: 450px">
								</div>
								@endif
								@endforeach
							</div>
							<!-- pagg slider of the page -->
							<ul class="list-unstyled slick-slider pagg-slider">
								<li><img src="/upload/{{$dish->dish_image}}" alt="image description" class="img-responsive" style="width: 200px; height: 150px"></li>
								@foreach($dish_image as $image)
								@if($dish->dish_id==$image->dish_id)
								<li><img src="/upload/{{$image->image}}" alt="image description" class="img-responsive" style="width: 200px; height: 150px"></li>
								@endif
								@endforeach

							</ul>
						</div>
						<h2 class="heading5">{{$dish->dish_name}}</h2>
						<!-- rating list of the page -->
						<ul class="list-unstyled rating-list">
							<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
						</ul>
						<strong class="price fontbase">Rs.{{$dish->price}}</strong>
						<p>{{$dish->dish_description}}</p>
						
						<!-- footer of the page -->
					<form method="post" action="{{url('add_to_cart')}}">
						@csrf
						<input type="hidden" name="dish_id" value="{{$dish->dish_id}}">
						<input type="hidden" name="dish_name" value="{{$dish->dish_name}}">
						<input type="hidden" name="dish_price" value="{{$dish->price}}">
						<input type="hidden" name="dish_image" value="{{$dish->dish_image}}">
						<input type="hidden" name="dish_price" value="{{$dish->price}}">
						

						
						<footer class="footer">
							<div class="f-holder">
								
								<ul class="list-unstyled size-list">
									<li class="heading3">Select Size:</li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">S<input type="hidden" name="dish_size" value="S"></a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">M<input type="hidden" name="dish_size" value="M"></a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">L<input type="hidden" name="dish_size" value="L"></a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">XL</a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">XXL</a></li>
								</ul>
							</div>
							<div class="f-holder">
								<ul class="list-unstyled tag-list text-uppercase">
									<li class="title"><i class="fa fa-tag"></i></li>
									
								</ul>
								<ul class="list-unstyled social-network">
									<li class="heading3">Share link:</li>
									<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
								</ul>
							</div>
						</footer>
						<!-- holder of the page -->
						<div class="holder">
							<input type="number" value="1" name="dish_quantity" min="1"> 
							<ul class="list-unstyled text-center social-networks">
								<li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
								<li>
									<a href="javascript:void(0);">
										<button type="submit">
											<i class="fa fa-shopping-cart" aria-hidden="true">
										    </i>
										</button>   
								    </a>
								</li>
							</ul>
						</div>
					</form>
						<!-- accordion of the page -->
						<ul class="accordion list-unstyled">
							<li class="active">
								<a href="javascript:void(0);" class="opener heading3 text-uppercase">Product DESCRIPTION</a>
								<div class="slide">
									<p><strong>Adult Signature Required :</strong>You must be at least 21 years of age to purchase wine. Adult signature is required on delivery.</p>
									<p><strong>Weather Related Delays : </strong> The seller may delay shipment if the temperature at the shipping or delivery address is not between 45°F and 80°F.</p>
								</div>
							</li>
							
							<li>
								<a href="javascript:void(0);" class="opener heading3 text-uppercase">Customer Reviews {{$review->count()}}</a>
								<div class="slide">

									@foreach($review as $reviews)

									<div class="row">
										<div class="col-md-8">
											<p>{{$reviews->comment}}</p>
										</div>
										<div class="col-md-2">
											<p>{{$reviews->rating}}/5</p>
										</div>
									</div>
									
									@endforeach
								</div>
							</li>
						</ul>

						
						<div class="container" style="background-color:#0000009c;margin-top: 10px;">
	            <div class="row">

		            <div class="card-group">

		              <div class="col-md-6" style="border:1px solid white">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Detailed Rating</h5>
                        <ul class="list-unstyled">
										      <li>
									          5 stars
											      <span> <progress class="pull-right" value="{{$rate5}}" style="height: 20px; width: 80%; margin-top:4px;" max="100">  </progress></span>
										      </li>
										      <li>
									          4 stars
											      <progress class="pull-right" value="{{$rate4}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
										      </li>
										      <li>
									          3 stars
											      <progress class="pull-right" value="{{$rate3}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
										      </li>
										      <li>
									          2 stars
											      <progress class="pull-right" value="{{$rate2}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
										      </li>
										      <li>
									          1 stars
											      <progress class="pull-right" value="{{$rate1}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
										      </li>
									      </ul>	
                      </div>
                      <div class="card-footer">
                        <small class="text-muted"></small>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4" style="border:1px solid white">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title" style="margin-bottom: 27.5px;">Average Rating</h5>
                       
								          @if($avg_rate>4) 
								          <h1>
									          <?php
								             echo number_format($avg_rate,1);
								            ?>	
								          </h1>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <p>
									          <?php
								             echo number_format($avg_rate,1);
								            ?> rating
								          </p>

								          @elseif($avg_rate>3)
								          <h1>
									          <?php
								             echo number_format($avg_rate,1);
								            ?>	
								          </h1>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star" style="color: #f9a134;"></i>
								          <i class="fas fa-star"></i>
								          <p>
									          <?php
								             echo number_format($avg_rate,1);
								            ?> rating
								          </p>

								          @elseif($avg_rate>2)
								          <h1>
									        <?php
								           echo number_format($avg_rate,1);
								          ?>	
								        </h1>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star"></i>
								        <i class="fas fa-star"></i>
								        <p>
									        <?php
								           echo number_format($avg_rate,1);
								          ?> rating
								        </p>

								        @elseif($avg_rate>1)
								        <h1>
									        <?php
								           echo number_format($avg_rate,1);
								          ?>	
								        </h1>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star"></i>
								        <i class="fas fa-star"></i>
								        <p>
								        	<?php
								           echo number_format($avg_rate,1);
								          ?> rating
								        </p>

								        @elseif($avg_rate>0)
								        <h1>
								        	<?php
								           echo number_format($avg_rate,1);
								          ?>	
								        </h1>
								        <i class="fas fa-star" style="color: #f9a134;"></i>
								        <i class="fas fa-star"></i>
								        <i class="fas fa-star"></i>
								        <i class="fas fa-star"></i>
								        <i class="fas fa-star"></i>
								        <p>
								        	<?php
								           echo number_format($avg_rate,1);
								          ?> rating
								        </p>
								        @else
								        <h1>
								        	<?php
								           echo number_format($avg_rate,1);
								          ?>	
								        </h1>
								
								        <p>
								        	<?php
								           echo number_format($avg_rate,1);
								          ?> rating
								        </p>
								        @endif
						
                      </div>
                      <div class="card-footer">
                        <small class="text-muted" style="">
                        
                        </small>
                      </div>
                    </div>
                  </div>


                </div>
              <div>
            </div>

						<div class="container" style="background-image: url('/upload/login.jpg'); background-repeat: no-repeat;background-size: cover;">
							<div class="row">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header">
											<h2>Add Review</h2>
											<hr>
										</div>
										<div class="card-body">
											<form method="post" action="{{url('add_review')}}">
												@csrf
												<input type="hidden" name="dish_id" value="{{$dish->dish_id}}">
												<div class="form-group">
													<label style="font-size: 20px;color: #ccc;">Rating</label><br>
													  <input type="range" min="1" max="5" value="3" class="slider" name="rating" id="myRange" style="width: 80%">
													  <span id="demo"></span>/5
												</div>

												<div class="form-group">
													<textarea name="comment" class="form-control" rows="2" cols="3" placeholder="Write Review"></textarea>
												</div>

												<button class="btn-primary active lg-round text-center fwBold text-uppercase" style="width:40%;  font-size:15px" type="submit">Submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	           

	</section>
			<!-- feature sec of the page -->
			
		</main>
     
<script>

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
@endsection 


