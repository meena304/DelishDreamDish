@extends('admin.master')
@section('tittle', 'Dish ')

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
                <h3 class="card-title">Dish</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{url('dish/update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="dish_id" value="{{$data->dish_id}}">
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                      <option value="">Select</option>
                      @foreach($category as $categories)
                      <option value="{{$categories->category_id}}"
                        @if($data->category_id==$categories->category_id) selected @endif>{{$categories->tittle}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Dish Name</label>
                    <input type="text" name="dish_name" value="{{$data->dish_name}}" required class="form-control">
                  </div>    

                  <div class="form-group">
                    <label>Dish Description</label>
                    <input type="text" value="{{$data->dish_description}}" name="dish_description" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" value="{{$data->price}}" name="price" required class="form-control">
                  </div>  

                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" value="{{$data->quantity}}" required class="form-control">
                  </div> 

                  <div class="form-group">
                    <label>Dish Image</label>
                    <input type="file" name="dish_image" class="form-control">
                  </div> 
                  <br><br>
                  <img src="/upload/{{$data->dish_image}}" class="w-25">
                  <br><br>

                  <div class="form-group">
                    <label>Status</label>
                    <br>
                    <input type="radio" name="dish_status" value="1" required 
                    @if($data->dish_status=='1') checked @endif> Active
                    <br>
                    <input type="radio" name="dish_status" value="0" required 
                    @if($data->dish_status=='0') checked @endif > Inactive
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
