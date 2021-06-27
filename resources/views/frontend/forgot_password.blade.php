<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

	<div class="container" style="margin-top:50px">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<div class="card" style="padding:60px">
					<div class="card-header" >
						<h1><strong>Forgot Password</strong></h1>
						<p style="color:grey">Enter your e-mail address and we'll send you a link to reset your password</p>
					</div>
					<div class="card-body">
						@if(session('message'))
                        <p class="alert alert-success m-auto">
    	                    {{session('message')}}
                        </p>
                        @endif
                        <br>
						<form method="post" action="{{url('password/reset/link')}}">
		                    @csrf
		                    <div class="form-group">
		                    	<label><b>Email</b></label>
		                        <input type="email" name="email" class="form-control" placeholder="E-mail Address">
		                    </div>
		                    
		                    <button type="submit" class="btn btn-primary w-100" style=""><b>Request password reset link</b></button>
	                    </form>
					</div>
					
				</div>
				
			</div>
			<div class="col-md-3"></div>

		</div>
	</div>

	

</body>
</html>