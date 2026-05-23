<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add($id)
    {
        $check = Wishlist::where(
            'user_id',
            Auth::id()
        )

        ->where(
            'product_id',
            $id
        )

        ->first();

        if(!$check)
        {
            Wishlist::create([

                'user_id'=>Auth::id(),

                'product_id'=>$id

            ]);
        }

        return redirect()->back();
    }

    public function index()
    {
        $wishlist = Wishlist::join(
            'products',
            'wishlists.product_id',
            '=',
            'products.id'
        )

        ->where(
            'wishlists.user_id',
            Auth::id()
        )

        ->select(
            'wishlists.*',
            'products.id as product_id',
            'products.name',
            'products.price',
            'products.image',
            'products.brand'
        )

        ->get();

        return view(
            'mobile.wishlist',
            compact('wishlist')
        );
    }

    public function remove($id)
    {
        Wishlist::find($id)->delete();

        return redirect()->back();
    }
}