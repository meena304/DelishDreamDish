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
						<h1><strong>Reset Password</strong></h1>
						
					</div>
					<div class="card-body">
						
                        <br>
						<form method="post" action="{{url('reset/password')}}">
		                    @csrf
		                    <input type="hidden" name="id" value="{{$user->id}}">
		                    <div class="form-group">
		                    	<label><b>New Password</b></label>
		                        <input type="password" name="password" class="form-control">
		                    </div>
		                    
		                    <button type="submit" class="btn btn-primary w-100" style=""><b>Reset Password</b></button>
	                    </form>
					</div>
					
				</div>
				
			</div>
			<div class="col-md-3"></div>

		</div>
	</div>

</body>
</html>