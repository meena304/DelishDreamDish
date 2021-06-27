@extends('admin.master')
@section('tittle', 'Dashboard')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
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
    <div class="container-fluid text-center">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-info"> -->
              <div class="inner">
                <i class="fas fa-list-alt" style="font-size: 70px"></i>
                <hr>
                <p>Total Categories</p>
                <h3>{{$category->count()}}</h3>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-success"> -->
              <div class="inner">
                <i class="fab fa-product-hunt" style="font-size:70px"></i>
                <hr>
                <p>Total Products</p>
                <h3>{{$dish->count()}}</h3>
              </div>
            <!--   <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('admin/dish') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-warning"> -->
              <div class="inner">
                <i class="fas fa-users" style="font-size:70px"></i>
                <hr>
                <p>Total Customer</p>
                <h3>{{$customer->count()-1}}</h3>
              </div>
             <!--  <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-primary"> -->
              <div class="inner">
                
                <i class="fas fa-spinner" style="font-size:70px"></i>
                <hr>
                <p>Pending Delivery</p>
                <h3>{{$pending}}</h3>
              </div>
             <!--  <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-info"> -->
              <div class="inner">
                
                <i class="fas fa-rupee-sign" style="font-size:70px"></i>
                <hr>
                <p>Paid Order</p>
                <h3>{{$paid}}</h3>

              </div>
             <!--  <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>

          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-success"> -->
              <div class="inner">
                <i class="fas fa-store" style="font-size:70px"></i>
                <hr>
                <p>In Making Order</p>
                <h3>{{$in_making}}</h3>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>

        </div>
        <br>

       <div class="row text-center">
         
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-warning"> -->
              <div class="inner">
              
                <i class="fas fa-gift" style="font-size:70px"></i>
                <hr>
                <p>Packed Order</p>
                <h3>{{$packed}}</h3>

              </div>
             <!--  <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6 ">
            <!-- small box -->
           <!--  <div class="small-box bg-transparent"> -->
              <div class="inner">
                <i class="fas fa-shipping-fast new_font" style="font-size:70px"></i>
                <hr>
                <p>Shipped Order</p>
                <h3>{{$shipped}}</h3>
              </div>
              <!-- div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            <!-- </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-transparent"> -->
              <div class="inner">
                <i class="fas fa-money-bill-alt" style="font-size:70px"></i>
                <hr>
                <p>Cash On Dilevery</p>
                <h3>{{$cod}}</h3>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
           <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
           <!--  <div class="small-box bg-transparent"> -->
              <div class="inner">
                <i class="fas fa-check-circle" style="font-size:70px"></i>
                <hr>
                <p>Complete Order</p>
                <h3>{{$complete}}</h3>
              </div>
              <!-- div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            <!-- </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-danger"> -->
              <div class="inner">
                <i class="fas fa-exclamation-triangle" style="font-size:70px"></i>
                <hr>
                <p>Failed Order</p>
                <h3>{{$failed}}</h3>
                <hr>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
        </div>
        <br>
    </div>

            
    <!-- /.content -->

</div>

  <!-- /.content-wrapper --> 


@endsection