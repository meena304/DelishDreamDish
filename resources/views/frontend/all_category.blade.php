@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')

       <div class="space bg-black">
       	
       </div>
			<!-- banner of the page -->
			<section class="banner bg-parallax " style="background-image:url(https://images.unsplash.com/photo-1579617487912-9076f1db97d5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHJlc3RhdXJhbnQlMjBoZHxlbnwwfDB8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60);">
				<div class="container">
					<div class="row">
						
					</div>
				</div>
			</section>


       <!-- feature sec of the page -->
			<div class="feature-sec container">
				<div class="row">
					<!-- header of the page -->
					<header class="col-xs-12 text-center header wow fadeInUp" data-wow-delay="0.4s">
						<span class="title fontpinyon">Vineyard</span>
						<h1 class="heading text-uppercase">All Category</h1>
						<div class="header-img">
							<img src="/images/bdr-img.png" alt="image description" class="img-responsive">
						</div>
					</header>
				</div>
				<div class="row">
					
					@foreach($category as $categories)
					
						<div class="col-xs-12 col-sm-4">
							<!-- team sec of the page -->
							<div class="team-col">
								<div class="img-holder">
									<a href="{{url('dish/show/'.$categories->category_id)}}">
									<img src="/upload/{{$categories->image}}" class="img-responsive" alt="team member" style="height: 350px; width: 400px">
								</a>
									<ul class="list-unstyled social-icons text-center">
										<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-dribbble"></a></li>
									</ul>
								</div>
								<div class="txt-wrap">
									<h3 class="heading4 text-capitalize">{{$categories->tittle}}</h3>
									<span class="desination text-uppercase">sales executive</span>
								</div>
							</div>
						</div>
					@endforeach


				
					</div>
			</div>


@endsection