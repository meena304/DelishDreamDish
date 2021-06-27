@extends('frontend.master')
@section('tittle', 'My Account')

@section('content')

<section style="margin-top:200px">	
	<div class="container" style="color:white;">
		<br>
		<div class="row">
			<div class="col-md-6 ml-auto">
			    
					<div class="a-row">
						
						<div class="col-md-9">
							<h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
                                Your Addresses
                            </h2>
                        <div><span class="a-color-secondary">{{Auth::user()->address}}</span>
                        	{{ Auth::user()->city}}, <span> {{Auth::user()->state}}</span>
                        	<br>
                        	{{ Auth::user()->pin_code}}</div>
                        	<br>
                        	<a href="{{url('edit/address')}}" class="btn-primary  text-center text-uppercase lg-round">Edit  </a>
                        </div>
                        
                    </div>
              
            </div>

          
	     </div>
	     <br><br>
</section>

@endsection