<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveryboy;

class DeliveryboyController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new Deliveryboy;

        $pass = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $password = substr(str_shuffle($pass), 0, 8);
    	
    	$data->delivery_boy_name = $a->delivery_boy_name;
    	$data->phone_num = $a->phone_num;
    	$data->status = $a->status;
    	$data->password = $password;
    	$data->date_of_joining = $a->date_of_joining;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/delivery_boy')->with('message','Delivery Boy Added Successfully');
    	}

    }

    public function delete($id)
    {
    	$data = Deliveryboy::find($id);
    	$deleted = $data->delete();

    	if($deleted)
    	{
    		return redirect('admin/delivery_boy')->with('message','Delivery Boy Deleted Successfully');

    	}
    }

    public function edit($id)
    {
    	$data = Deliveryboy::find($id);
    	return view('admin.delivery_boy.edit_delivery_boy',compact('data'));
    }

    public function update(Request $a)
    {
    	$data = Deliveryboy::find($a->delivery_boy_id);
    	// $password = '123456';
    	$data->delivery_boy_name = $a->delivery_boy_name;
    	$data->phone_num = $a->phone_num;
    	$data->status = $a->status;
    	$data->password = $a->password;
    	$data->date_of_joining = $a->date_of_joining;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/delivery_boy')->with('message','Delivery Boy Updated Successfully');
    	}
    }
}
