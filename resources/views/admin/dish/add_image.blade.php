@extends('admin.master')
@section('tittle', 'Dish')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dish </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dish </li>
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
                <h3 class="card-title">Dish </h3>
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Image </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                  
                    <th class="w-50">Dish Image</th>
                    <th>Dish Status</th>
                    <th >Action</th>

                  </tr>
                </thead>

                <tbody>
                  @foreach($image as $images)
                  @if($data->dish_id==$images->dish_id)
                  <tr>
                <td>
                  <img src="/upload/{{$images->image}}" style="width: 20%">
                </td>
                <td>{{$images->status}}</td>
                <td>
                  <a href="{{url('dish/delete_image/'.$images->id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>

                </td>
            </tr>

                @endif
              @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <th>Dish Image</th>
                    <th>Dish Status</th>
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
        <h3 class="modal-tittle" ><b>Add Dish </b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('dish/more_image')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="dish_id" value="{{$data->dish_id}}">
          <div class="form-group">
            <label>Dish Image</label>
            <input type="file" name="image" required class="form-control">
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
