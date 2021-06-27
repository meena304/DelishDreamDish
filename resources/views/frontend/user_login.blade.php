@extends('frontend.master')
@section('tittle', 'Restaurant')

@section('content')

<!-- main slider of the page -->
<div class="main-slider">
	<!-- slide of the page -->	
	<div class="bg-full" style="background-image:url(/upload/login.jpg);">
					
		<div class="container" style="margin-top:100px">
	        <div class="row">
	        	<div class="col-md-3">
		        </div>
		        <div class="col-md-6" style="background-color: #0000009c;">
			        <div class="card shadow-lg p-3 mb-5 rounded">
				        <div class="card-header text-center">
					        <h1>Login</h1>
					        <br>
				        </div>
				    <div class="card-body">
					
			        <!-- login form of the page -->
			        <form class=" text-center" method="post" action="{{url('user/login')}}">
				        @csrf
				
				        <fieldset>
					        <div class="form-group">
						        <input type="hidden" name="role" value="1">
						        <input class="form-control" name="email" type="text" placeholder="Email*:">
					        </div>
					        <br>
					        <div class="form-group">
						
						        <input class="form-control" name="password" type="password"  placeholder="Password*:">

					        </div>
					        <br>
				
					        <button class="btn-primary active lg-round text-center fwBold text-uppercase" style="width:100%;  font-size:20px" type="submit">login</button>
				        <br>
				        </fieldset>
			        </form>
			        <br>
			        <div class="wrap">
				        <a href="{{url('user_registration')}}"  class=" pull-left">Register</a>
				        <a href="{{url('forgot/password')}}" class="pull-right">Forget Password</a>
			        </div>
			        <br>
			        <div class="wrap">
				        <br>

				
		                <a href="{{ url('auth/google') }}" id="google-button" class="btn btn-block btn-social btn-google" style="width: 100%;color: white;">
		         	        <i class="fa fa-google"></i> Sign in with google
		                </a>		
			        </div>
				</div>
				<div class="col-md-3">
		        </div>
			</div>  
		    <br><br>
	    </div>
       
	</div>	
	<br><br>		
</div>





@endsection