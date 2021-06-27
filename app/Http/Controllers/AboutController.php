<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function add(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
    	$data = new About;
    	$data->heading  = $a->heading ;
        $data->dscription  = $a->dscription ;
        $data->hotline  = $a->hotline ;
        $data->open_time  = $a->open_time ;
    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/about')->with('message','New About Added Successfully..');
    	}
    }

    public function delete($id)
    {
    	// echo $id;
    	$data = About::find($id);
    	$deleted = $data->delete();
    	if($deleted)
    	{
    		return redirect('admin/about')->with('message','About Deleted Successfully');
    	}
    }

    public function edit($id)
    {
        $data = About::find($id);
    	return view('admin.about.edit_about',compact('data'));
    }

    public function update(Request $a)
    {
    	if($a->hasfile('image'))
    	{
    	$data = About::find($a->id);
    	$data->heading  = $a->heading ;
        $data->dscription  = $a->dscription ;
        $data->hotline  = $a->hotline ;
        $data->open_time  = $a->open_time ;     

    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

    	if($data)
    	{
    		return redirect('admin/about')->with('message',' About Updated Successfully..');
    	}
    	}
    	else
    	{
    		$data = About::find($a->id);
        $data->heading  = $a->heading ;
        $data->dscription  = $a->dscription ;
        $data->hotline  = $a->hotline ;
        $data->open_time  = $a->open_time ;
            $data->save();

    	    if($data)
    	    {
    		    return redirect('admin/about')->with('message',' About Updated Successfully..');
    	    }
    	}
    }
}

