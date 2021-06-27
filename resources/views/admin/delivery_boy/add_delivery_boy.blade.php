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
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Delivery Boy</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>Delivery Boy Name</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="w-25">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $delivery_boy)
                	<tr>
                		<td>{{$delivery_boy->delivery_boy_name}}</td>
                		<td>{{$delivery_boy->phone_num}}</td>
                    <td>@if($delivery_boy->status=='1')
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                    <td>{{$delivery_boy->date_of_joining}}</td>
                		<td>
                			<a href="{{url('delivery_boy/edit/'.$delivery_boy->delivery_boy_id)}}" class="btn"><i class="fas fa-edit"></i></a>
                			<a href="{{url('delivery_boy/delete/'.$delivery_boy->delivery_boy_id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></a>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Delivery Boy Name</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date</th>
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
        <h3 class="modal-tittle" ><b>Add Delivery Boy</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('delivery_boy/add')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Delivery Boy Name</label>
            <input type="text" name="delivery_boy_name" required class="form-control">
          </div>    

          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_num" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Date</label>
            <input type="date" name="date_of_joining" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Status</label>
            <br>
            <input type="radio" name="status" value="1" required > Active
            <br>
            <input type="radio" name="status" value="0" required > Inactive
          </div>  


          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add Delivery Boy-->
