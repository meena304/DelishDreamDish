@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')
            @if(Session::get('error_code')==6)
			{
				echo '<script type="text/javascript">
				         $(function() {
                        $('#popup1').modal('show');
                         });
			          </script>';}
			@endif
			
       <div class="space bg-black">
       	
        </div>
			<!-- banner of the page -->
			<section class="banner bg-parallax " style="background-image:url(https://images.unsplash.com/photo-1579617487912-9076f1db97d5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHJlc3RhdXJhbnQlMjBoZHxlbnwwfDB8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60);">
				<div class="container">
					<div class="row">
						
					</div>
				</div>
			</section>


     

			<!-- banner of the page -->
			
			<!-- Shopping cart of the page -->
			<div class="shopping-cart container">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<!-- cart table of the page -->
							<table class="cart-table" id="example">
								<thead>
									<tr class="text-uppercase">
										<th>Id</th>
										<th>image</th>
										<th>product name</th>
										<th>price</th>
										<th>quantity</th>
										<th class="wrap">
											<span class="pull-left">totel</span>
											<a href="#" class="fa fa-close text-center"></a>
										</th>
									</tr>
								</thead>
								<tbody>
									
								<?php $totalamount = 0; ?>
								@foreach($item as $items)
									<tr >
										<td class="id">{{$items->id}}</td>
										
										<td>
											<div class="product-img">
												<img src="/upload/{{$items->dish_image}}" alt="image-description" class="img-responsive">
											</div>
										</td>
										<td>
											<div class="content-holder">
												<h3><a href="shop-detail.html">{{$items->dish_name}}</a></h3>
												<div class="holder">
													<span class="color-code pull-left">Color:</span>
													<span class="size-code pull-left">Size: <a href="#" class="lg-round text-center">{{$items->dish_size}}</a></span>
												</div>
											</div>
										</td>
										<td class="price fwBold">
											Rs.{{$items->dish_price}}
										</td>
										
										<td>	
                                          
                                            <a href="#" class="plus" onclick="add(<?php echo $items->dish_quantity; ?>)"><i class="fas fa-plus" style="color: #fbbe28"></i></a>
                                            <!-- <input type="text" id="ne" value="9"> -->
                                            <input type="text" name="dish_quantity" id="cart" value="{{$items->dish_quantity}}" style="outline: none; background-color: transparent;width: 30px;border: none; color: white;    margin-left: 18px;font-size: 18px">

                                            <a href="#" class="minus"><i class="fas fa-minus" style="color: #fbbe28"></i></a>
										</td>
										
										<td class="wrap">
											<span  class="price pull-left fwBold">
											<b>Rs.{{$items->dish_price*$items->dish_quantity}}</b>
											
										    </span>
											<a href="#" class="fa fa-close pull-right text-center"></span>
										</td>
									</tr>
									
									<?php $totalamount = $totalamount+($items->dish_price*$items->dish_quantity);
									
									?>
										
								@endforeach
								
								</tbody>
							</table>
							<a href="#" class="btn-primary pull-left lg-round text-uppercase text-center">continue shopping</a>
							<a href="#" class="btn-primary active pull-right lg-round text-uppercase text-center">update cart</a>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Cart Widget of the page -->
					<div class="col-xs-12 col-sm-4 cart-widget text-center">
						<h3 class="heading3 text-uppercase">estimate shipping and tax</h3>
						<p>Enter your destination to get shipping &amp; tax</p>
						<!-- Shipping form of the page -->
						
					</div>
					<!-- Cart Widget of the page -->
					<div class="col-xs-12 col-sm-4 cart-widget text-center">
						<h3 class="heading3 text-uppercase">DIscount codes</h3>
						<p>Enter your coupin if you have one</p>
						<!-- Subscribe Form of the page -->
						
					</div>
					<!-- Cart Widget of the page -->
					<div class="col-xs-12 col-sm-4 cart-widget text-center">
						<h3 class="heading3 text-uppercase">CART TOTAL</h3>
						<ul class="list-unstyled cart-totel text-uppercase">
							
							<li>grand total: <strong class="heading2"> <?php echo $totalamount; ?></strong></li> 
							
						</ul>
						<span class="txt fontjosefin">Checkout with multiple address</span>
						
						@guest
                            <a href="{{url('user_login')}}" class="  btn-primary  text-center text-uppercase lg-round">proceed to checkout</a>
						   
                            @if (Route::has('user/registration'))
                                <li class="nav-item">
                                    <a class="nav-link lightbox" href="#popup3">Register</a>
                                </li>
                            @endif
                            
                            @else
                               
                                <a href="{{url('user/checkout')}}" class=" btn-primary  text-center text-uppercase lg-round">proceed to checkout</a>
                                    
                        @endguest
                   
					</div>
				</div>
			</div>


@endsection

<script>
	 function add(quantity)
	{
		var cartt =++ quantity;
		
		document.getElementById('cart').value = cartt;


	

		
           
        
	}
</script>