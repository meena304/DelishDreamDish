@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')

<div class="space bg-black"></div>
			<!-- banner of the page -->
			<section class="banner bg-parallax " style="background-image:url(/upload/checkout.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">Check Out</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="index.html">Home</a></li>
								<li>/</li>
								<li>Check Out</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Checkout Sec of the page -->
			<div class="checout-sec left-sidebar container">
				<div class="row">
					
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-8 form-holder">
						<h2 class="heading3 text-center">BILLING ADDRESS</h2>
						<!-- Checkout Form of the page -->
						<form class="checkout-form" method="post" action="{{url('placeorder')}}">
							@csrf
							<fieldset>
								<input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
								<div class="form-group">
									<label class="text-uppercase">FIRST NAME *</label>
									<input class="form-control" name="name" value="{{Auth::user()->name}}" type="text">
								</div>
								
								
								<div class="form-group">
									<label class="text-uppercase">address *</label>
									<input class="form-control" name="address" value="{{Auth::user()->address}}"  type="text" placeholder="Street Address">
								</div>
								
								<div class="form-group">
									<label class="text-uppercase">TOWN / CITY *</label>
									<input class="form-control" name="city" value="{{Auth::user()->city}}"  type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">COUNTRY / STATES</label>
									<input class="form-control" name="state" value="{{Auth::user()->state}}"  type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">POSTCODE / ZIP *</label>
									<input class="form-control" name="pin_code" value="{{Auth::user()->pin_code}}"  type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">EMAIL ADDRESS *</label>
									<input class="form-control" name="user_email" value="{{Auth::user()->email}}" type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">PHONE *</label>
									<input class="form-control" name="phone_num" value="{{Auth::user()->phone_num}}"  type="tel">
								</div>
								
								
							</fieldset>
						<!-- </form> -->
					</div>
					<aside class="col-xs-12 col-md-4">
						<!-- Cart Widget of the page -->
						<!-- <div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase">PROMOTIONAL CODE</h3>
							<p class="text-left">Enter your coupon code if you have one</p>
							<form class="subscribe-form">
								<fieldset>
									<input class="form-control" type="email" placeholder="Coupon code">
									<button type="submit" class="btn-primary text-uppercase lg-round">Subscribe</button>
								</fieldset>
							</form>
						</div> -->
						<!-- Cart Widget of the page -->
						<!-- Open Me -->
						<!-- coupon code -->
						<div class="cart-widget text-center">
                            <h3 class="heading3 text-uppercase" style="color:white;">your order</h3>

                            <ul class="list-unstyled cart-totel">

                                <li class="text-uppercase" style="color:white;">product<span class="titles pull-right">total</strong></li>
                         
                                <?php  $totalamount = 0; ?>

                                @foreach($item as $c)

                                <li style="color: white;" >{{$c->dish_name}} X {{$c->dish_quantity}}
                                	<strong class="heading2 pull-right">
                                        {{ $c->dish_price* $c->dish_quantity}}
                                    </strong>
                                </li>
                                <?php
                                $totalamount = $totalamount +  $c->dish_price*$c->dish_quantity
                                ?>
                                @endforeach
                                @if(!empty(Session::get('couponamount')))
                                <li class="bdr-b text-uppercase" style="color:white;">Sub Total
                                    <strong class="heading2 pull-right">RS.<?php echo $totalamount; ?>
                                        <input type="hidden" value="">
                                    </strong>
                                </li>
                                <!-- couponcode -->
       
                                <li class="bdr-b text-uppercase" style="color:white">coupon discount
                                    <strong class="heading2 pull-right">RS.
                                    <?php
                                        echo Session::get('couponamount')
                                    ?>
                                        <input type="hidden" name="grand_total" value="">
                                    </strong>
                                </li>
                   
                                <li class="bdr-b text-uppercase" style="color:white"> Grand Total
                                    <strong class="heading2 pull-right">RS.
                                     <?php
                                     echo $totalamount -  Session::get('couponamount')
                                     ?>
                                        <input type="hidden" name="grand_total" value= "
                                        <?php
                                        echo $totalamount -  Session::get('couponamount')
                                        ?>
                                        ">
                                    </strong>
                                </li>
                                @else
                                <li class="bdr-b text-uppercase" style="color:white;"> Grand Total
                                    <strong class="heading2 pull-right">RS.
                                       <?php
                                       echo $totalamount;
                                       ?>
                                       <input type="hidden" name="grand_total" value= "
                                       <?php
                                       echo $totalamount;
                                       ?>
                                       ">
                                    </strong>
                                </li>
                                @endif

                            </ul>
                        </div>

						<!-- <div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase">your order</h3>
							<ul class="list-unstyled cart-totel">
								<li class="text-uppercase">product<span class="titles pull-right">totel</strong></li>
									<?php $totalamount = 0; ?>
								@foreach($item as $items)
								<li>{{$items->dish_name}}x{{$items->dish_quantity}}<strong class="heading2 pull-right">Rs.{{$items->dish_price*$items->dish_quantity}}</strong></li>
								
								
								<li>Cart Subtotal<span class="heading2 pull-right">Rs.{{$items->dish_price*$items->dish_quantity}}</strong></li>
								<li>Shipping and Handling<span class="pull-right">Free Shipping</span></li>
								<li class="bdr-b text-uppercase">Grand Total<strong class="heading2 pull-right">Rs.</strong></li>
							
							<?php $totalamount = $totalamount+($items->dish_price*$items->dish_quantity);
									
									?>
							@endforeach
							<li class="bdr-b text-uppercase">Grand Total<strong class="heading2 pull-right">Rs.<?php echo $totalamount; ?>
								<input type="hidden" name="grand_total" value="<?php echo $totalamount; ?>">
							</strong></li> 
						</ul>
						</div> -->
						<!-- Cart Widget of the page -->
						<div class="cart-widget">
							<!-- <form action="#" class="currency-form"> -->
								<feildset>
									<label for="radio-6">
										<input id="radio-6" class="cod" value="cod" name="payment_method" type="radio">
										<span class="fake-input"></span>
										<span class="fake-label">Cash On Delivery</span>
									</label>
									<br>
									<label for="radio-7">
										<input id="radio-7" class="paytm" name="payment_method" value="paytm" type="radio">
										<span class="fake-input"></span>
										<span class="fake-label">PayTM</span>
									</label>
									<br>
									<label for="radio-8">
										<input id="radio-8" class="razorpay" name="payment_method" value="razorpay" type="radio">
										<span class="fake-input"></span>
										<span class="fake-label">RazorPay</span>
									</label>
									<br>
									<button class="btn-primary active text-center text-uppercase lg-round" onclick="Confirmation()" type="submit">Place Order</button>
								</feildset>
							</form>

						</div>

						<!-- coupon code -->
						@if(session('massage'))
                        <h2 class="alert alert-info text-center" style="color: green;">
                        {{ session('massage') }}
                        </h2>
                        @endif
 
                        <div class="cart-widget text-center">
                        <h3 class="heading3 text-uppercase">PROMOTIONAL CODE</h3>
                        <p class="text-left">Enter your coupon code if you have one</p>

                    <form class="subscribe-form" action="{{url('coupon-code-apply')}}" method="post">
                    @csrf
                    <fieldset>
                    <input class="form-control" type="text" name="coupon" placeholder="Coupon code" style="color: white;">
                    <button type="submit" class="btn-primary text-uppercase lg-round" style="    margin-top: 20px;">apply</button>
                    </fieldset>
                    </form>
                    </div>
                    </div>

					</aside>
				</div>
			</div>  

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


		<script type="text/javascript">


					// var id = jQuery('#id').val();

					var options = 
					{ 
						"key": "rzp_test_8ngMbnpaA82xZB", 
					    "amount": "100", 
				        "currency": "INR",    
				        "name": " Deli",    
				        "description": "Test Transaction",    
				        "image": "https://example.com/your_logo",
				         // "order_id": "order_9A33XWu170gUtm", 
		                //This is a sample Order ID. Pass the `id` obtained in the response of Step 1  
		                "handler": function (response)
		                {   
		                
		                	// alert(response.razorpay_payment_id);
		                	// alert(response.razorpay_order_id);
		                	// alert(response.razorpay_signature);  
		                	// console.log(response);
		                	jQuery.ajax({
		                		type:'post',
		                		url:'http://127.0.0.1:8000/'+'paysuccess',
		                		data: {
		                			razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
		                		}, 
		                		success:function(result){
		                			// window.location.href='new.php';
		                			swal({
                                     title: "Good job!",
                                     text: "You clicked the button!",
                                     icon: "success",
                                    
                                    });
		                		}
		                	});
		                },

		                "prefill": 
		                {        
		                	"name": "jkbhj",
		                	"email": "gyjk",
		                	"contact": "jhgj"
		                }, 
		                "notes": 
		                {        
		                	"address": "Razorpay Corporate Office"    
		                },    
		                "theme": { "color": "#3399cc" }
		            };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function (response)
                    {        
                	  // alert(response.error.code);        
                       // alert(response.error.description);        
                      // alert(response.error.source);        
                      // alert(response.error.step);        
                      // alert(response.error.reason);        
                      // alert(response.error.metadata.order_id);   
                      //    alert(response.error.metadata.payment_id);
                        jQuery.ajax({
		                    type:'post',
		                    url:'done.php',
		                    data:"fpayment_id="+response.error.metadata.payment_id+"&id="+id,
		                    success:function(result){
		                			
		                    }
		                });
                    });
                    document.getElementById('rzp-button1').onclick = function(e)
                        {    
                           	rzp1.open();    
                           	e.preventDefault(); 
                        }
        </script>
@endsection