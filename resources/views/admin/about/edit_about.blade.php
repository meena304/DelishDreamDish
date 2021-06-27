@extends('admin.master')
@section('tittle', 'Category')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

            <div class="card">
              <div class="card-header">

                <form method="post" action="{{url('about/update')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$data->id}}">

          <div class="form-group">
            <label>Heading</label>
            <input type="text" name="heading" value="{{$data->heading}}" required class="form-control">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="dscription" cols="4" rows="4" required class="form-control">{{$data->dscription}}</textarea>
           
          </div>

          <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <img src="{{url('/upload/'.$data->image)}}" class="w-25">
                  </div>

          <div class="form-group">
            <label>Hotline</label>
            <input type="number" name="hotline" value="{{$data->hotline}}" required class="form-control">
          </div>

          <div class="form-group">
            <label>Opening Time</label>
            <input type="text" name="open_time" value="{{$data->open_time}}" required class="form-control">
          </div>

          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 

@endsection
