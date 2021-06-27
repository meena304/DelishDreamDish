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

    @if(session('message'))
    <p class="alert alert-success w-50 h-15 m-auto">
    	{{session('message')}}
    </p>
    @endif
    <br><br>

    <!-- Main content -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Category</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>Tittle</th>
                    <th class="w-25">Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="w-25">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $category)
                	<tr>
                		<td>{{$category->tittle}}</td>
                		<td>
                			<img src="/upload/{{$category->image}}" class="w-50" style="height:100px">
                		</td>
                    <td>@if($category->status=='1')
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                    <td>{{$category->date}}</td>
                		<td>
                			<a href="{{url('category/edit/'.$category->category_id)}}"class="btn"><i class="fas fa-edit"></i></a>
                			<a href="{{url('category/delete/'.$category->category_id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>

                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Tittle</th>
                    <th>Image</th>
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

<!--Add Category-->
<div class="modal fade" id="aa" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-tittle" ><b>Add Category</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('category/add')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Tittle</label>
            <input type="text" name="tittle" required class="form-control">
          </div>    

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Category Status</label>
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
<!--Add Category-->