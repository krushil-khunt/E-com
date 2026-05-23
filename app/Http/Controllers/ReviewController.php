<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request,$id){
        Review::create([
            "user_id"=>Auth::id(),
            "product_id"=> $id,
            "rating"=>$request->rating,
            "review"=> $request->review,
        ]);
        return redirect()->back();
    }
    //ProductController માં Reviews મોકલ va mate
    public function show($id)
{
    $product = Product::find($id);

    $reviews = \App\Models\Review::join('users','reviews.user_id','=','users.id')

    ->where('product_id',$id)

    ->select('reviews.*','users.name')

    ->latest()

    ->get();

    return view('products.details',compact('product','reviews'));
}

}
