<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new Coupon;
    	
    	$data->coupon_code = $a->coupon_code;
    	$data->coupon_value = $a->coupon_value;
    	$data->coupon_status = $a->coupon_status;
    	$data->coupon_type = $a->coupon_type;
    	$data->cart_min_value = $a->cart_min_value;
    	$data->date = $a->date;
    	$data->expired_on = $a->expired_on;

    	$data->save();

    	if($data)
    	{
    		return redirect('admin/coupon')->with('message','Coupon Added Successfully');
    	}

    }

    public function delete($id)
    {
    	$data = Coupon::find($id);
    	$deleted = $data->delete();

    	if($deleted)
    	{
    		return redirect('admin/coupon')->with('message','Coupon Deleted Successfully');

    	}
    }

    public function edit($id)
    {
    	$data = Coupon::find($id);
    	return view('admin.coupon.edit_coupon',compact('data'));
    }

    public function update(Request $a)
    {
        // echo '<pre>';
        // print_r($a->all());
    	$data = Coupon::find($a->coupon_id);
    	$data->coupon_code = $a->coupon_code;
    	$data->coupon_value = $a->coupon_value;
    	$data->coupon_status = $a->coupon_status;
    	$data->coupon_type = $a->coupon_type;
    	$data->cart_min_value = $a->cart_min_value;
    	$data->date = $a->date;
    	$data->expired_on = $a->expired_on;

    	$data->save();

    	if($data)
    	{
    		return redirect('admin/coupon')->with('message','Coupon Boy Updated Successfully');
    	}
    }
}
