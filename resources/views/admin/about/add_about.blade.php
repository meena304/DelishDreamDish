@extends('admin.master')
@section('tittle', 'About')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                <h3 class="card-title">About</h3>
                <button class="btn btn-primary" data-target="#aa" data-toggle="modal" style="float: right;">Add About</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Hotline</th>
                    <th>Open Timing</th>
                    <th class="w-25">Image</th>
                    <th class="w-25">Action</th>

                  </tr>
                </thead>

                <tbody>
                	@foreach($data as $about)
                	<tr>
                    <td>{{$about->heading}}</td>
                    <td>{{$about->dscription}}</td>
                    <td>{{$about->hotline}}</td>
                    <td>{{$about->open_time}}</td>
                		<td>
                			<img src="/upload/{{$about->image}}" class="w-50">
                		</td>
                		<td>
                			<a href="{{url('about/edit/'.$about->id)}}" class="btn"><i class="fas fa-edit"></i></a>
                			<a href="{{url('about/delete/'.$about->id)}}" style="color: red; width: 100px"><i class="fas fa-trash-alt"></i></a>

                		</td>
                	</tr>
                	@endforeach
                </tbody>
              
                <tfoot>
                  <tr>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Hotline</th>
                    <th>Open Timing</th>
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
        <h3 class="modal-tittle" ><b>Add About</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
        
        <form method="post" action="{{url('about/add')}}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Heading</label>
            <input type="text" name="heading" required class="form-control">
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="dscription" required class="form-control">
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" required class="form-control">
          </div> 

          <div class="form-group">
            <label>Hotline</label>
            <input type="number" name="hotline" required class="form-control">
          </div>

          <div class="form-group">
            <label>Opening Time</label>
            <input type="text" name="open_time" required class="form-control">
          </div>

          <input type="submit" name="submit" value="ADD" class="btn btn-info ">   
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add Category-->