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

                <form method="post" action="{{url('category/update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="category_id" value="{{$data->category_id}}">
                  <div class="form-group">
                    <label>Tittle</label>
                    <input type="text" name="tittle" value="{{$data->tittle}}" required class="form-control">
                  </div>    

                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <img src="{{url('/upload/'.$data->image)}}" class="w-25">
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" value="{{$data->date}}" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Category Status</label>
                    <br>
                    <input type="radio" name="status" value="1" required
                    @if($data->status=='1') checked @endif > Active
                    <br>
                    <input type="radio" name="status" value="0" required
                    @if($data->status=='0') checked @endif  > Inactive
                  </div>  

                  <input type="submit" name="submit" value="Update" class="btn btn-info w-25">   
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
