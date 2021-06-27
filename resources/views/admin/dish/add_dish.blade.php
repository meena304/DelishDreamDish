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
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Dish </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Dish Image</th>
                    <th>Dish Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Dish Status</th>
                    <th class="w-50">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $dish)
                	<tr>
                		<td>{{$dish->dish_name }}</td>
                		<td>
                    <img src="/upload/{{$dish->dish_image}}" class="w-100">  
                    </td>
                    <td>{{$dish->dish_description}}</td>
                    <td>Rs.{{$dish->price}}</td>
                    <td>{{$dish->quantity}}</td>
                    <td>
                      @foreach($category as $categories)
                      @if($dish->category_id==$categories->category_id)
                          {{$categories->tittle}}
                        @endif
                      @endforeach
                    </td>

                    <td>@if($dish->dish_status=='1')
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                		<td>
                			<a href="{{url('dish/edit/'.$dish->dish_id)}}" class="btn"><i class="fas fa-edit"></i></a>
                			<a href="{{url('dish/delete/'.$dish->dish_id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>
                      <a href="{{url('dish/add_image/'.$dish->dish_id)}}" class="btn"><i class="fas fa-images"></i></a>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Dish Name</th>
                    <th>Dish Image</th>
                    <th>Dish Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
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
        
        <form method="post" action="{{url('dish/add')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
              <option value="">Select</option>
              @foreach($category as $categories)
              <option value="{{$categories->category_id}}">{{$categories->tittle}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Dish Name</label>
            <input type="text" name="dish_name" required class="form-control">
          </div>    

          <div class="form-group">
            <label>Dish Description</label>
            <input type="text" name="dish_description" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" required class="form-control">
          </div>  

          <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="quantity" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Dish Image</label>
            <input type="file" name="dish_image" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Status</label>
            <br>
            <input type="radio" name="dish_status" value="1" required > Active
            <br>
            <input type="radio" name="dish_status" value="0" required > Inactive
          </div>  


          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add Delivery Boy-->
