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
            <h1 class="m-0">Order Items </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Items </li>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Items </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Details</th>
                    <th class="w-50">Product Image</th>
                  

                  </tr>
                </thead>
                           
               <tbody>
               	<?php $i=1; ?>
               	@foreach($data as $order)
               	<tr>
               		<td>{{$i++}}</td>
               		<td>
               			<br>
               			<b>Name:</b>{{$order->dish_name}}<br>
                       <b>Size:</b>{{$order->dish_size}}<br>
                        <b>Price:</b>{{$order->dish_price}}<br>
                        <b>Quantity:</b>{{$order->dish_quantity}}
                      

               		</td>
               
               		
               		<td><img src="/upload/{{$order->dish_image}}" style="width:50%; height: 200px;"></td>
               	</tr>
               	@endforeach
               </tbody>
              
                <tfoot>
                  <tr>
                  	<th>#</th>
                    <th>Details</th>
                    <th>Product Image</th>
                 
                
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