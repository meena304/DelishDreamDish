@extends('frontend.master')
@section('tittle', 'My Account')

@section('content')
<!-- <div class="space bg-black"></div> -->
<!-- banner of the page -->
<!-- 			<section class="banner bg-parallax overlay" style="background-image:url(https://via.placeholder.com/1920x460);">
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
			</section> -->
			<!-- Checkout Sec of the page -->

<section >
<div class="container" style="color:white;">
	<h1>Your Account</h1>
	<hr>
	<br>	
	<!-- Shopping cart of the page -->
	<div class="shopping-cart container">
		
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
				<div class="card-body">
					<hr>
                <table id="example1" class="table bg-dark" style="font-size: 20px; letter-spacing: 1px;">
                  
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Details</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Grand Total</th>
                    <th>Items</th>
                  </tr>
                </thead>
                           
               <tbody>
               	<?php $i=1; ?>
               	@foreach($data as $order)
               	<tr>
               		<td>{{$i++}}</td>
               		<td>
               			<b>Order no#: </b>{{$order->id}}<br>
               			<b>Name: </b>{{$order->name}}<br>
                        <b>Contact: </b>{{$order->phone_num}}<br>
                        <b>Email: </b>{{$order->user_email}}
               		</td>
               		<td>{{$order->created_at}}</td>
               		<td>{{$order->order_status}}</td>
               		<td>Rs.{{$order->grand_total}}</td>
               		<td>
               			<a href="{{url('admin/order_items/'.$order->id)}}" class="btn btn-danger">View Items</a>
               		</td>
               	</tr>
               	@endforeach
               </tbody>
              
               
                </table>
                </div>	
            </div>
			</div>
		</div>				
	</div>					
</div>
</section>

@endsection