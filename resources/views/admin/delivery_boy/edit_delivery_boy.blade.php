@extends('admin.master')
@section('tittle', 'Delivery Boy')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Delivery Boy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Delivery Boy</li>
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
                <h3 class="card-title">Delivery Boy</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{url('delivery_boy/update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="delivery_boy_id" value="{{$data->delivery_boy_id}}">
                  <input type="hidden" name="password" value="{{$data->password}}">

                  <div class="form-group">
                    <label>Delivery Boy Name</label>
                    <input type="text" name="delivery_boy_name" value="{{$data->delivery_boy_name}}" required class="form-control">
                  </div>    

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_num" value="{{$data->phone_num}}" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date_of_joining" value="{{$data->date_of_joining}}" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Status</label>
                    <br>
                    <input type="radio" name="status" value="1" required 
                    @if($data->status=='1') checked @endif> Active
                    <br>
                    <input type="radio" name="status" value="0" required
                    @if($data->status=='0') checked @endif > Inactive
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
