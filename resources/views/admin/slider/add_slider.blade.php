@extends('admin.master')
@section('tittle', 'Slider')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                <h3 class="card-title">Slider</h3>
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add Slider</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th class="">Image</th>
                    <th class="">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $slider)
                	<tr>
                		<td>
                			<img src="/upload/{{$slider->image}}" class="w-25">
                      <form method="post" action="{{url('slider/update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    </div>
                     <input type="submit" name="submit" value="Update" class="btn btn-info w-25">  
                  
                      </form>
                		</td>
                        
                		<td>
                		
                			<a href="{{url('slider/delete/'.$slider->id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>

                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Image</th>
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
        <h3 class="modal-tittle" ><b>Add Slider</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('slider/add')}}" enctype="multipart/form-data">
          @csrf
       

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" required class="form-control">
          </div> 

          

          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add Category-->