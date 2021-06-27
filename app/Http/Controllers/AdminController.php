<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Deliveryboy;
use App\Coupon;
use App\Dish;
use App\Slider;
use App\About;
use App\DishOrder;
use App\DishItem;






class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
    	// echo 'dashboard';

        $category = Category::all();
        $dish = Dish::all();
        $pending = DishOrder::where(['order_status'=>'Pending'])->count();
        $paid = DishOrder::where(['order_status'=>'Paid'])->count();
        $shipped = DishOrder::where(['order_status'=>'Shipped'])->count();
        $packed = DishOrder::where(['order_status'=>'Packed'])->count();
        $in_making = DishOrder::where(['order_status'=>'In-making'])->count();
        $failed = DishOrder::where(['order_status'=>'Failed'])->count();
        $complete = DishOrder::where(['order_status'=>'Complete'])->count();
        $cod = DishOrder::where(['payment_method'=>'cod'])->count();
        $customer = User::all();
    	return view('admin.dashboard',compact('category','dish','customer','pending','cod','paid','shipped','in_making','failed','packed','complete'));
    }
    public function category()
    {
    	$data = Category::all();
    	return view('admin.category.add_category',compact('data'));
    }

    public function delivery_boy()
    {
        $data = Deliveryboy::all();
        return view('admin.delivery_boy.add_delivery_boy',compact('data'));
    }

    public function coupon()
    {
        $data = Coupon::all();
        return view('admin.coupon.add_coupon',compact('data'));
    }

    public function dish()
    {
        $category = Category::all();
        $data = Dish::all();
        return view('admin.dish.add_dish',compact('data','category'));
    }

    public function slider()
    {
        $data = Slider::all();
        return view('admin.slider.add_slider',compact('data'));
    }

    public function about()
    {
        $data = About::all();
        return view('admin.about.add_about',compact('data'));
    }

    public function order()
    {
        $data = DishOrder::orderBy('id','desc')->get();
        $pending = DishOrder::where(['order_status'=>'Pending'])->count();
        $paid = DishOrder::where(['order_status'=>'Paid'])->count();
        $shipped = DishOrder::where(['order_status'=>'Shipped'])->count();
        $packed = DishOrder::where(['order_status'=>'Packed'])->count();
        $in_making = DishOrder::where(['order_status'=>'In-making'])->count();
        $failed = DishOrder::where(['order_status'=>'Failed'])->count();
        $complete = DishOrder::where(['order_status'=>'Complete'])->count();
        $cod = DishOrder::where(['payment_method'=>'cod'])->count();
        return view('admin.order.all_order',compact('data','pending','cod','paid','shipped','in_making','failed','packed','complete'));
    }

    public function order_items($id)
    {
        // echo $id;
        $data = DishItem::where('order_id',$id)->orderBy('id','desc')->get();
        return view('admin.order.all_order_item',compact('data'));
    }

    public function ord_status_update(Request $a)
    {
        DishOrder::where(['id'=>$a->id])->update(['order_status'=>$a->order_status]);
        return redirect()->back();
    }

    public function invoice($id)
    {
        $order = DishOrder::find($id);
        $item = DishItem::where('order_id',$id)->orderBy('id','desc')->get();
        return view('admin.invoice',compact('order','item'));
    }
}
