<!-- feature sec of the page -->
			<div class="feature-sec container">
				<div class="row">
					<!-- header of the page -->
					<header class="col-xs-12 text-center header wow fadeInUp" data-wow-delay="0.4s">
						<span class="title fontpinyon">DelishDream</span>
						<h1 class="heading text-uppercase">All Dishes</h1>
						<div class="header-img">
							<img src="images/bdr-img.png" alt="image description" class="img-responsive">
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
									<img src="/upload/{{$categories->image}}" class="img-responsive img-fluid" alt="team member" style="height: 350px;">
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


					<div class="col-xs-12 text-center">
						<br>
						<a href="{{url('category/all_category')}}" class="btn-primary lg-round text-uppercase">View All</a>
					</div>

					
					</div>
			</div>