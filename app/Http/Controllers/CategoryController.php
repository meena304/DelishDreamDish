<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new Category;
    	$data->tittle = $a->tittle;
        $data->status = $a->status;
        $data->date = $a->date;

    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/category')->with('message','New Category Added Successfully..');
    	}
    }

    public function delete($id)
    {
    	// echo $id;
    	$data = Category::find($id);
    	$deleted = $data->delete();
    	if($deleted)
    	{
    		return redirect('admin/category')->with('message','Category Deleted Successfully');
    	}
    }

    public function edit($id)
    {
    	$data = Category::find($id);
    	return view('admin.category.edit',compact('data'));
    }

    public function update(Request $a)
    {
    	if($a->hasfile('image'))
    	{
    	$data = Category::find($a->category_id);
    	$data->tittle = $a->tittle;
        $data->status = $a->status;
        $data->date = $a->date;

    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/category')->with('message',' Category Updated Successfully..');
    	}
    	}
    	else
    	{
    		$data = Category::find($a->category_id);
    	    $data->tittle = $a->tittle;
            $data->status = $a->status;
            $data->date = $a->date;
            $data->save();

    	    if($data)
    	    {
    		    return redirect('admin/category')->with('message','New Category Added Successfully..');
    	    }
    	}
    }

    public function all_category()
    {
        $category = Category::all();
        return view('frontend.all_category',compact('category'));


    }
}
