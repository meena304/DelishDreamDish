<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new Slider;
 
    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/slider')->with('message','New Dish Added Successfully..');
    	}
    }

    public function delete($id)
    {
    	// echo $id;
    	$data = Slider::find($id);
    	$deleted = $data->delete();
    	if($deleted)
    	{
    		return redirect('admin/slider')->with('message','Slider Deleted Successfully');
    	}
    }

    public function edit($id)
    {
  
        $data = Slider::find($id);
    	return view('admin.slider.edit_slider',compact('data'));
    }

    public function update(Request $a)
    {
   
    	$data = Slider::find($a->id);
   

    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/slider')->with('message',' Slider Updated Successfully..');
    	}
    	
    	
    }
}
