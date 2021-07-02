@extends('frontend.master')
@section('content')


<!-- main of the page -->
      
         <div class="space bg-black"></div>
         <!-- banner of the page -->
         <section class="banner bg-parallax " style="background-image:url('/images/dish1.jpg');">
            <div class="container">
               <div class="row">
                  
               </div>
            </div>
         </section>
         <!-- shop sec of the page -->
         <section class="shop-sec">
            <div class="container">
               <div class="row">
                  <!-- content of the page -->
                  <article id="content" class="col-xs-12 col-md-9">
                     <div class="col-xs-12">
                        <select>
                           <option value="0">12 item/pages</option>
                           <option value="1">13 item/pages</option>
                           <option value="2">14 item/pages</option>
                        </select>
                        <select>
                           <option value="0">Name: A to Z</option>
                           <option value="1">Vine Yard</option>
                           <option value="2">Vodca</option>
                        </select>
                        <ul class="list-unstyled viewFilterLinks">
                           <li class="active"><a href="javascript:void(0);" class="fa fa-th-large"></a></li>
                           <li><a href="javascript:void(0);" class="fa fa-list"></a></li>
                        </ul>
                     </div>

                     @foreach($dish as $dishes)
                     <div class="col-xs-12 col-sm-4">
                        <!-- feature col of the page -->
                        <div class="feature-col">
                           <div class="img-holder text-center">
                              <a href="{{url('dish/detail/'.$dishes->dish_id)}}"><img src="/upload/{{$dishes->dish_image}}" alt="image description" class="img-responsive" style="height: 300px"></a>
                           </div>
                           <div class="txt-wrap">
                              <h2 class="heading3"><a href="shop-detail.html">{{$dishes->dish_name}}</a></h2>
                              <footer class="footer">
                                 <ul class="list-unstyled rating-list pull-left">
                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
                                 </ul>
                                 <strong class="price pull-right">Rs. {{$dishes->price}}</strong>
                              </footer>
                           </div>
                           <ul class="list-unstyled text-center social-network">
                              <li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                              <li><a href="compare.html"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                              <li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                              <li><a href="shopping-cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                     
                  </article>
                  <!-- sidebar of the page -->
                  <aside id="sidebar" class="col-xs-12 col-md-3">
                     <!-- widget of the page -->
                     <section class="widget category-widget">
                        <h2 class="heading2 text-uppercase">CATEGORIES</h2>
                        <ul class="list-unstyled text-uppercase category-list">
                           @foreach($category as $categories)
                           <li><a href="{{url('dish/show/'.$categories->category_id)}}">{{$categories->tittle}}</a></li>
                           @endforeach
                           
                        </ul>
                     </section>
                     <!-- widget of the page -->
                  
                     <!-- widget of the page -->
                    
                     <!-- widget of the page -->
                     <section class="widget size-widget">
                        <h2 class="heading2 text-uppercase">sizes</h2>
                        <ul class="list-unstyled size-list text-center">
                           <li><a href="javascript:void(0);">S</a></li>
                           <li><a href="javascript:void(0);">M</a></li>
                           <li><a href="javascript:void(0);">L</a></li>
                           <li><a href="javascript:void(0);">XL</a></li>
                           <li><a href="javascript:void(0);">XXL</a></li>
                        </ul>
                     </section>
               
                  
                  </aside>
               </div>
            </div>
         </section>


@endsection
