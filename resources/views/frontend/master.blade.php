<!DOCTYPE html>
<html lang="en">
<head>

	<!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the apple mobile web app capable -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the apple mobile web app status bar style -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- set the description -->
	<meta name="description" content="Vine Yard HTML Template">
	<!-- set the Keyword -->
	<meta name="keywords" content="blog, clean, clear, creative, design web, ecommerce, flat, Indoor Furniture, marketing, portfolio, vineyard, wines, wines WordPress theme, winewinery">
	<meta name="author" content="Vine Yard HTML Template">
	<title>@yield('tittle')</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Philosopher:400,700%7CPinyon+Script" rel="stylesheet">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/admin/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/font-awesome.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/bootstrap.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/plugins.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/icofont.css')}}"> 
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/style.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/responsive.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/colors.css')}}">

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body style="background-color: #1a1a1a">
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- Header of the page -->
		<header id="header" class="v1">
			<!-- header holder of the page -->
			<div class="header-holder " style="background-color: black">
				<div class="container-fluid">
					<!-- setting wrap of the page -->
					<ul class="list-unstyled setting-wrap pull-left">
						
						<li><a href="javascript:void(0);" class="nav-opener visible-xs hidden"><i class="fa fa-bars"></i></a></li>

						<li>
							<a href="javascript:void(0);" class="setting-drop-opener"><i class="icon-setting"></i></a>
							
							<!-- cart dropdown of the page -->
							<div class="cart-dropdown">
								<!-- setting-drop of the page -->
								<div class="setting-drop">
									<ul class="list-unstyled account-list">
                                        <li><a href="{{url('my_account')}}">My Account</a></li>
                              
										<li><a href="shopping-cart.html">My Cart</a></li>
									</ul>
									<hr>	
								</div>
							</div>
						</li>
					</ul>
					
					<!-- widget cart wrap of the page -->
					<!-- show item in icon --> 
					<?php 

					$session = Session::getId();
					// dd($session); 
					$r = DB::table('carts')->where('session_id',$session)->get();
					// print_r($r);
					if(Auth::check())
					{
			            $cart = DB::table('carts')->where('user_email',Auth::user()->email)->get();
			            // print_r($cart);
					}
					 ?>
					
					<ul class="list-unstyled widget-cart-wrap pull-right">
						<li><a href="#popup1" class="lightbox"><i class="icon-search" style="color: white;"></i></a></li>

						
						@guest
                            <li><a href="{{url('user_login')}}" class=""><i class="icon-user"></i></a></li>
						   
                            @if (Route::has('user/registration'))
                                <li class="nav-item">
                                    <a class="nav-link lightbox" href="#popup3">Register</a>
                                </li>
                            @endif
                            
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                            <li class="nav-item dropdown">    
                                <a class="dropdown-item" href="{{url('user/logout')}}">Logout     
                                </a>
                            </li>
                                   
                               
                        @endguest

						<li>
							<a href="javascript:void(0);" class="cart-drop-opener"><i class="icon-cart"></i> <span class="num round fontjosefin text-center">
								@if(Auth::check()) 

								{{$cart->count()}}

								@else
								{{$r->count()}}
								@endif

							</span></a>
							<!-- Cart Dropdown of the page -->
							<div class="cart-dropdown right">
								<!-- Cart Menu of the page -->
								<ul class="list-unstyled cart-menu">

									@if(Auth::check())

									    @if($cart->count()>0)
									    <?php $totalamount = 0; ?>
									      @foreach($cart as $cart_data)


									<li>
										<div class="img-holder bdr pull-left">
											<a href="shopping-cart.html"><img src="/upload/{{$cart_data->dish_image}}" alt="image description" class="img-responsive"></a>
										</div>
										<div class="align-left pull-left">
											<h3 class="heading3"><a href="shopping-cart.html">{{$cart_data->dish_name}}</a></h3>
											<span class="price clr">{{$cart_data->dish_quantity}} x {{$cart_data->dish_price}}</span>
											<a href="javascript:void(0);" class="close"><i class="fa fa-times"></i></a>
										</div>
									</li>

									<?php $totalamount = $totalamount+($cart_data->dish_price*$cart_data->dish_quantity);
									
									?>
									 @endforeach

									<li class="total-price text-uppercase">
										total:
										<em class="price clr fwBold pull-right">
											<?php echo $totalamount; ?>
										</em>
									</li>

									<li>
										<a href="shopping-cart.html" class="btn-primary active text-center text-uppercase lg-round">View Card</a>
										<a href="checkout.html" class="btn-primary lg-round text-center text-uppercase">Check Out</a>
									</li>
									     
									    @endif

									 @else
									 @if($r->count()>0)
									    <?php $totalamount = 0; ?>
									      @foreach($r as $cart_data)


									<li>
										<div class="img-holder bdr pull-left">
											<a href="shopping-cart.html"><img src="/upload/{{$cart_data->dish_image}}" alt="image description" class="img-responsive"></a>
										</div>
										<div class="align-left pull-left">
											<h3 class="heading3"><a href="shopping-cart.html">{{$cart_data->dish_name}}</a></h3>
											<span class="price clr">{{$cart_data->dish_quantity}} x {{$cart_data->dish_price}}</span>
											<a href="javascript:void(0);" class="close"><i class="fa fa-times"></i></a>
										</div>
									</li>
									<?php $totalamount = $totalamount+($cart_data->dish_price*$cart_data->dish_quantity);
									
									?>
									 @endforeach

									<li class="total-price text-uppercase">
										total:
										<em class="price clr fwBold pull-right">
											<?php echo $totalamount; ?>
										</em>
									</li>

									<li>
										<a href="shopping-cart.html" class="btn-primary active text-center text-uppercase lg-round">View Card</a>
										<a href="checkout.html" class="btn-primary lg-round text-center text-uppercase">Check Out</a>
									</li>
									@endif
									@endif
								</ul>
							</div>
						</li>


						
						
						 <!-- <li><a href="javascript:void(0);" class="search-opener"><i class="icon-search"></i></a></li> -->
					</ul>
					<div class="logo">
						<a href="index.html"><img src="{{url('/images/logo.png')}}" alt="Vine Yard" class="img-responsive"></a>
					</div>
				</div>
			</div>
			<!-- nav holder of the page -->
			<div class="nav-holder container">
				<div class="row">
					<div class="col-xs-12">
						<!-- nav of the page -->
						<nav id="nav">
							<ul class="list-unstyled text-center">
								<li class="n-logo"><a href="index.html"><img src="{{url('/images/logo.png')}}" alt="Vine Yard" class="img-responsive"></a></li>
								<li class="active"><a href="{{url('/')}}">Home</a></li>
							
								<!-- dropdown of the page -->
								<li class="dropdown">
									<a href="javascript:void(0);">Categories</a>
									<!-- dropdown menu of the page -->
									<ul class="dropdown-menu text-left">
										@foreach($category as $categories )
										<li><a href="{{url('dish/show/'.$categories->category_id)}}">{{$categories->tittle}}</a></li>
										@endforeach
										
									</ul>
								</li>
								
								<li><a href="contactus.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- main of the page -->
		<main id="main">
			<!-- main slider of the page -->
			@if(Session::has('message'))
			{

				echo '<script type="text/javascript">
					var a = '{{Session::get('message')}}';
				        alert(a);
			          </script>';}
			@endif
		    @yield('content')

		</main>
		<!-- footer of the page -->
		<footer id="footer" class="bg-black">
			<!-- footer aside of the page -->
			<aside class="footer-aside bg-grey">
				<!-- socail network of the page -->
				<ul class="social-network list-unstyled">
					<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-twitter active"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
				</ul>
				<div class="payment-img">
					<a href="javascript:void(0);"><img src="images/img35.png" class="img-responsive" alt="Payment Card"></a>
				</div>
				<a id="back-top" class="round"><i class="fa fa-chevron-up"></i></a>
			</aside>
			<!-- footer folder of the page -->
			<div class="footer-holder">
				<div class="container">
					<div class="row mar-bt">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="logo">
								<a href="index.html"><img class="img-responsive" src="{{url('/images/logo.png')}}" alt="vineyard" ></a>
							</div>
							<!-- contact list of the page -->
							<ul class="list-unstyled contact-list">
								<li>Address : No 40 Baria Sreet 133/2 Morar<br class="hidden-xs">Gwalior, India</li>
								<li>Email: <a href="mailto:mku304@gmail.com">mku304@gmail.com</a></li>
								<li>Phone: <a href="tell:(+1)234456789">(+91) 7777777777</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<h3 class="heading3">My Accounts</h3>
							<!-- f nav of the page -->
							<ul class="list-unstyled f-nav">
								<li><a href="{{url('my_account')}}">My account</a></li>
								<li><a href="{{url('cart')}}">My Cart</a></li>
								<li><a href="{{url('user_login')}}">Login</a></li>
								<li><a href="{{url('user_registration')}}">Register</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<h3 class="heading3">Categories</h3>
							<!-- f nav of the page -->
							<ul class="list-unstyled f-nav">
								<li><a href="{{url('category/all_category')}}" class="btn-primary lg-round text-uppercase" style="color: white;">All Categories</a></li>
								
							</ul>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-12">
							<!-- footer nav of the page -->
							<ul class="list-unstyled footer-nav text-center">
								<li><a href="javascript:void(0);">About</a></li>
								<li><a href="javascript:void(0);">Customer Service</a></li>
								<li><a href="javascript:void(0);">Terms &amp; Conditions</a></li>
								<li><a href="javascript:void(0);">Privacy Policy</a></li>
								<li><a href="javascript:void(0);">Site Map</a></li>
								<li><a href="javascript:void(0);">Contact</a></li>
							</ul>
						</div>													
						<div class="col-xs-12">
							<div class="copyright text-center">
								<p>Copyright<a href="javascript:void(0);"> Delish Dream Dish</a>. All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
	</div>
	<!-- main container of all the page elements end -->

  <div class="popup-holder">

  	<!-- search pop -->
  	<div id="popup1" class="search-holder">
  		<!-- search holder of the page -->

    <!-- select form of the page -->
    <form action="{{url('/search')}}" method="get" class="select-form">
    	<fieldset>
    		<select id="select">      
    			<option value="Search">Select</option>
    			@foreach($category as $c)
    			<option value="{{$c->tittle}}">{{$c->tittle}}</option>
    		    @endforeach
    	    </select>

            <input type="search" style="background-color:white;" name="quary" class="form-control fwNormal bdr" id="search" placeholder="Search"><button type="submit" class="sub-btn"><i class="fa fa-search"></i></button>
        </fieldset>
</form>
     

</div>

    <!-- login -->
	  <div id="loginpopup" class="lightbox-demo text-left">
			<h4 class="heading5 text-uppercase">login</h4>
			<!-- login form of the page -->
			<form class="login-form text-center" method="post" action="{{url('user/login')}}">
				@csrf
				
				<fieldset>
					<div class="form-group">
						<input type="hidden" name="role" value="1">
						<input class="form-control" name="email" type="text" placeholder="Email*:">
					</div>
					<div class="form-group">
						
						<input class="form-control" name="password" type="password" placeholder="Password*:">
					</div>
				
					<button class="btn-primary active lg-round text-center fwBold text-uppercase" style="width:100%" type="submit">login</button>
				
				</fieldset>
			</form>
			<div class="wrap">
				<a href="#popup3"  class="lightbox pull-left">Register</a>
				<a href="{{url('forgot/password')}}" class="pull-right">Forget Password</a>
			</div>
			<div class="wrap">
				<br>
				
		        <a href="{{ url('auth/google') }}" id="google-button" class="btn btn-block btn-social btn-google" style="width: 100%;color: white;">
		         	<i class="fa fa-google"></i> Sign in with google
		        </a>		
			</div>
		</div>

    <!-- registration -->
		<div id="popup3" class="lightbox-demo text-left">
			@if(Session::get('error_code')==5)
			{
				echo '<script type="text/javascript">
				         alert("Email Already Exists")
			          </script>';}
			@endif
			<h4 class="heading5 text-uppercase">Register</h4>
			<!-- registration form of the page -->
			<form class="login-form" method="post" action="{{url('registerusers')}}" >
				@csrf
				<fieldset>
					<div class="row">
						<div class="col-md-6">
					
					<div class="form-group">
						<input class="form-control" name="name" type="text" placeholder="Username*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="email" type="text" placeholder="Email*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="password" type="password" placeholder="Password*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="address" type="text" placeholder="Address*:">
					</div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" name="city" type="text" placeholder="City*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="state" type="text" placeholder="State*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="pin_code" type="text" placeholder="Pincode*:">
					</div>
					<div class="form-group">
						<input class="form-control" name="phone_num" type="text" placeholder="Phone*:">
					</div>
				</div>
					</div>
					<button class="btn-primary active lg-round text-center fwBold text-uppercase" type="submit">Register</button>
				</fieldset>
			</form>
			<div class="wrap">
				<a href="#popup1"  class="lightbox pull-left">Login</a>
				<a href="javascript:void(0);" class="pull-right">Forget Password</a>
			</div>
		</div>
	</div>


	
	<!-- include jQuery -->
	<script src="{{url('js/jquery.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{url('js/plugins.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{url('js/jquery.main.js')}}"></script>



<script>
    $(document).ready(function () {
        
    $("#example").on("click", ".plus", function(evt){

      var id = $(this).closest('tr').find('.id').text(); 
  
            // alert(id);
            evt.preventDefault();

            $.ajax({
            type:'GET',
            url: "/cart/update_quantity/"+id+"/1",
            dataType: 'json',
            success: function(response) {
            	alert(response);
            
            }
            });
        });
    });

    $(document).ready(function () {
            //Bind the click event for the button
        // $(".plus").bind("click", function (evt) {


    $("#example").on("click", ".minus", function(evt){

            // var id = $(this).find('.idd').value();
      var id = $(this).closest('tr').find('.id').text();

         
            // alert(id);
            evt.preventDefault();

            $.ajax({
            type:'GET',
            url: "/cart/update_quantity/"+id+"/-1",
            dataType: 'json',
             success: function(response){
             	alert(response);
                
            }
            });
        });
    });
</script>

<script>
	function selectPaymentMethod()
	{
		// alert("hello");
		if($('.stripe').is(':checked') || $('.cod').is(':checked') || $('.paytm').is(':checked') || $('.Instamojo').is(':checked') || $('.razorpay').is(':checked') )
			{
				// alert('checked');
			}
        else
        {
        	alert('Please select payment method');
            return false;
        }
	}
</script>

<script type="text/javascript">
function Confirmation() {
swal("Have a Good Meal!", "You Order is Placed!", "success");
}
</script>


<!-- Search Bar -->
<script>

var slider = document.getElementById("select");
var output = document.getElementById("search");
// output.value = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.value = this.value;
}
</script>

</body>
</html>