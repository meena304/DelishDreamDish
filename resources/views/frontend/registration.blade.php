



@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')

<!-- main slider of the page -->
<div class="main-slider">
	<!-- slide of the page -->	
	<div class="bg-full" style="background-image:url(/upload/login.jpg);">
					
		<div class="container" style="margin-top:100px">
	        <div class="row">
	        	<div class="col-md-2">
		        </div>
		        <div class="col-md-8" style="background-color: #0000009c;">
			        <div class="card shadow-lg p-3 mb-5 rounded">
				        <div class="card-header text-center">
					        <h1>Register</h1>
					        <br>
				        </div>
				    <div class="card-body">
					
			        <!-- login form of the page -->
			        <form class="login-form" method="post" action="{{url('registerusers')}}" >
				@csrf
				<fieldset>
					<div class="row">
						<div class="col-md-12">
						<div class="form-group">
						<input class="form-control" name="name" type="text" placeholder="Username*:">
					</div>
					<br>
					<div class="form-group">
						<input class="form-control" name="email" type="text" placeholder="Email*:">
					</div>
					<br>
					<div class="form-group">
						<input class="form-control" name="password" type="password" placeholder="Password*:">
					</div>
					<br>
				</div>


						<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" name="city" type="text" placeholder="City*:">
					</div>
					<br>
					<div class="form-group">
						<input class="form-control" name="state" type="text" placeholder="State*:">
					</div>
					
					
					</div>


					<div class="col-md-6">
					
					<div class="form-group">
						<input class="form-control" name="pin_code" type="text" placeholder="Pincode*:">
					</div>
					<br>
					<div class="form-group">
						<input class="form-control" name="phone_num" type="text" placeholder="Phone*:">
					</div>
				</div>
						<div class="col-md-12">
							<br>
				<div class="form-group">
					<textarea class="form-control" placeholder="Address" name="address" ></textarea>
						
					</div>
				</div>
					</div>
					<br>
					<button class="btn-primary active lg-round text-center fwBold text-uppercase" style="width:100%; font-size:20px"  type="submit">Register</button>
				</fieldset>
			</form>
			<br>
			<div class="wrap">
				<a href="{{url('user_login')}}"  class=" pull-left">Login</a>
				<a href="javascript:void(0);" class="pull-right">Forget Password</a>
			</div>
				</div>
				<div class="col-md-2">
		        </div>
			</div>  
		    <br><br>
	    </div>
       
	</div>	
	<br><br>		
</div>





@endsection


