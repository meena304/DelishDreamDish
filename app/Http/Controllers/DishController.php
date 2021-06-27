<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Category;
use App\AddImage;


class DishController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new Dish;
    	$data->dish_name  = $a->dish_name ;
        $data->dish_description  = $a->dish_description ;
        $data->dish_status  = $a->dish_status ;
        $data->price  = $a->price ;
        $data->quantity  = $a->quantity ;
        $data->category_id = $a->category_id;
       

    	$image = $a->file('dish_image');
    	$filename = 'dish_image'.time().'.'.$a->dish_image->extension();
    	$image->move('upload/',$filename);
    	$data->dish_image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/dish')->with('message','New Dish Added Successfully..');
    	}
    }

    public function delete($id)
    {
    	// echo $id;
    	$data = Dish::find($id);
    	$deleted = $data->delete();
    	if($deleted)
    	{
    		return redirect('admin/dish')->with('message','Dish Deleted Successfully');
    	}
    }

    public function edit($id)
    {
    	$category = Category::all();
        $data = Dish::find($id);
    	return view('admin.dish.edit_dish',compact('data','category'));
    }

    public function update(Request $a)
    {
    	if($a->hasfile('dish_image'))
    	{
    	$data = Dish::find($a->dish_id);
    	$data->dish_name  = $a->dish_name ;
        $data->dish_description  = $a->dish_description ;
        $data->dish_status  = $a->dish_status ;
        $data->price  = $a->price ;
        $data->quantity  = $a->quantity ;
        $data->category_id = $a->category_id;
       

    	$image = $a->file('dish_image');
    	$filename = 'dish_image'.time().'.'.$a->dish_image->extension();
    	$image->move('upload/',$filename);
    	$data->dish_image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/dish')->with('message',' Dish Updated Successfully..');
    	}
    	}
    	else
    	{
    		$data = Dish::find($a->dish_id);
    	    $data->dish_name  = $a->dish_name ;
            $data->dish_description  = $a->dish_description ;
            $data->dish_status  = $a->dish_status ;
            $data->price  = $a->price ;
            $data->quantity  = $a->quantity ;
            $data->category_id = $a->category_id;
            $data->save();

    	    if($data)
    	    {
    		    return redirect('admin/dish')->with('message','New Dish Added Successfully..');
    	    }
    	}
    }

    public function add_image($id)
    {
        // echo $id;
        $data = Dish::find($id);
        $image = AddImage::all();

        return view('admin.dish.add_image',compact('data','image'));
    }

    public function dish_images(Request $a)
    {
        // echo $id;
        $data = new AddImage;
        $data->dish_id = $a->dish_id;
        $data->status = $a->status;

        $image = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $image->move('upload/',$filename);
        $data->image = $filename;
        $data->save();

        if($data)
        {
            return redirect('dish/add_image/'.$data->dish_id)->with('message','Image Added Successfully');;
        }

        
    }

    public function delete_image($id)
    {
        $data = AddImage::find($id);
        $deleted = $data->delete();
        if($deleted);
        {
            return redirect('dish/add_image/'.$data->dish_id)->with('message','Image Deleted Successfully');
        }
    }
}
