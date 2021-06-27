@extends('admin.master')
@section('tittle', 'Coupon ')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupon </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Coupon </li>
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
                <h3 class="card-title">Coupon </h3>
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Coupon </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>Coupon Code</th>
                    <th>Coupon Type</th>
                    <th>Coupon Value</th>
                    <th>Cart Min. Value</th>
                    <th>Expired On</th>
                    <th>Added On</th>
                    <th>Coupon Status</th>
                    <th class="w-25">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $coupon)
                	<tr>
                		<td>{{$coupon->coupon_code}}</td>
                		<td>{{$coupon->coupon_type}}</td>
                    <td>Rs.{{$coupon->coupon_value}}</td>
                    <td>Rs.{{$coupon->cart_min_value }}</td>
                    <td>{{$coupon->expired_on}}</td>
                    <td>{{$coupon->date}}</td>

                    <td>@if($coupon->coupon_status=='1')
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                		<td>
                			<a href="{{url('coupon/edit/'.$coupon->coupon_id)}}" class="btn"><i class="fas fa-edit"></i></a>
                			<a href="{{url('coupon/delete/'.$coupon->coupon_id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Coupon Code</th>
                    <th>Coupon Type</th>
                    <th>Coupon Value</th>
                    <th>Cart Min. Value</th>
                    <th>Expired On</th>
                    <th>Added On</th>
                    <th>Coupon Status</th>
                    <th>Action</th>
                
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

<!--Add Delivery Boy-->
<div class="modal fade" id="aa" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-tittle" ><b>Add Coupon </b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('coupon/add')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Coupon Code</label>
            <input type="text" name="coupon_code" required class="form-control">
          </div>    

          <div class="form-group">
            <label>Coupon Value</label>
            <input type="text" name="coupon_value" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Coupon type</label>
            <select name="coupon_type" class="form-control">
              <option value="">Select</option>
              <option value="Fixed">Fixed</option>
              <option value="Percentage">Percentage</option>
            </select>
          </div>

          <div class="form-group">
            <label>Cart Min. Value</label>
            <input type="text" name="cart_min_value" required class="form-control">
          </div>  

          <div class="form-group">
            <label>Added On</label>
            <input type="date" name="date" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Expire On</label>
            <input type="date" name="expired_on" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Status</label>
            <br>
            <input type="radio" name="coupon_status" value="1" required > Active
            <br>
            <input type="radio" name="coupon_status" value="0" required > Inactive
          </div>  


          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add Delivery Boy-->
