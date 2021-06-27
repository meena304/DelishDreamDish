<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function add_review(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all());

        $data = new Review;
        $data->dish_id = $a->dish_id;
        $data->rating = $a->rating;
        $data->comment = $a->comment;
        $data->save();

        return redirect()->back()->with('message','Thanku for your review.');


    }
}
