@extends('admin.master')
@section('tittle', 'Order')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(session('message'))
    <p class="alert alert-success w-50 h-15 m-auto">
    	{{session('message')}}
    </p>
    @endif
    <br><br>

    <!-- Main content -->
     <div class="container-fluid text-center">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
           
              <div class="inner">
                
                <i class="fas fa-rupee-sign" style="font-size:70px"></i>
                <hr>
                <p>Paid Order</p>
                <h3>{{$paid}}</h3>


              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
         
              <div class="inner">
                <i class="fas fa-store" style="font-size:70px"></i>
                <hr>
                <p>In Making Order</p>
                <h3>{{$in_making}}</h3>
              </div>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
          
              <div class="inner">
              
                <i class="fas fa-gift" style="font-size:70px"></i>
                <hr>
                <p>Packed Order</p>
                <h3>{{$packed}}</h3>

              </div>
           
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6 text-center">
         
              <div class="inner">
                <i class="fas fa-shipping-fast new_font" style="font-size:70px"></i>
                <hr>
                <p>Shipped Order</p>
                <h3>{{$shipped}}</h3>
              </div>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
         
              <div class="inner">
                <i class="fas fa-money-bill-alt" style="font-size:70px"></i>
                <hr>
                <p>Cash On Dilevery</p>
                <h3>{{$cod}}</h3>
              </div>
             
          </div>

           <!-- ./col -->
          <div class="col-lg-2 col-6 text-center">
          
              <div class="inner">
                <i class="fas fa-check-circle" style="font-size:70px"></i>
                <hr>
                <p>Complete Order</p>
                <h3>{{$complete}}</h3>
              </div>
           
          </div>

        </div>
        <br>
        <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-2 col-6">
         
              <div class="inner">
                <i class="fas fa-exclamation-triangle" style="font-size:70px"></i>
                <hr>
                <p>Failed Order</p>
                <h3>{{$failed}}</h3>
                <hr>
              </div>
            
          </div>
        </div>
        <br>
    </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Details</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                    <th class="w-25">Action</th>

                  </tr>
                </thead>
                           
               <tbody>
               	<?php $i=1; ?>
               	@foreach($data as $order)
               	<tr>
               		<td>{{$i++}}</td>
               		<td>
               			<b>Order no#:</b>{{$order->id}}<br>
               			<b>Name:</b>{{$order->name}}<br>
                        <b>Contact:</b>{{$order->mobile}}<br>
                        <b>Email:</b>{{$order->user_email}}
               		</td>
               		<td>{{$order->created_at}}</td>
               		<td>
                    {{$order->order_status}}
                    <form method="post" action="{{url('order_status/update')}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$order->id}}">
                      <select name="order_status">
                        <option>Status</option>
                        <option value="Pending">Pending</option>
                        <option value="In-making">In-making</option>
                        <option value="Packed">Packed</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Complete">Complete</option>
                        <option value="Failed">Failed</option>
                      </select>
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </td>
               	
               		<td>
               			{{$order->payment_method}}</td>
               		<td>
               			<a href="{{url('admin/order_items/'.$order->id)}}" class="btn btn-primary">View Items</a>
                    <a href="{{url('admin/invoice/'.$order->id)}}" class="btn btn-success">Invoice</a>
               		</td>
               	</tr>
               	@endforeach
               </tbody>
              
                <tfoot>
                  <tr>
                  	<th>#</th>
                    <th> Details</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                    <th class="w-25">Action</th>
                
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    <!-- /.content -->
</div>
  <!-- /.content-wrapper --> 

@endsection