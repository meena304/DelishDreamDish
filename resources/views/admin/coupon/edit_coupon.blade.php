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
                <h3 class="card-title">Coupon</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{url('coupon/update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="coupon_id" value="{{$data->coupon_id}}">
                  <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="coupon_code" value="{{$data->coupon_code}}" required class="form-control">
                  </div>    

                  <div class="form-group">
                    <label>Coupon Value</label>
                    <input type="text" name="coupon_value" required value="{{$data->coupon_value}}" class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Coupon type</label>
                    <select name="coupon_type" class="form-control">
                      <option value="">Select</option>
                      <option value="Fixed"
                      @if($data->coupon_type == 'Fixed') selected @endif
                      >Fixed</option>
                      <option value="Percentage"
                      @if($data->coupon_type == 'Percentage') selected @endif
                      >Percentage</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Cart Min. Value</label>
                    <input type="text" value="{{$data->cart_min_value}}" name="cart_min_value" required class="form-control">
                  </div>  

                  <div class="form-group">
                    <label>Added On</label>
                    <input type="date" value="{{$data->date}}" name="date" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Expire On</label>
                    <input type="date" value="{{$data->expired_on}}" name="expired_on" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Status</label>
                    <br>
                    <input type="radio" name="coupon_status" value="1" required 
                    @if($data->coupon_status=='1') checked @endif> Active
                    <br>
                    <input type="radio" name="coupon_status" value="0" required
                    @if($data->coupon_status=='0') checked @endif > Inactive
                  </div> 

                  <input type="submit" name="submit" value="Update" class="btn btn-info ">   
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 

@endsection
