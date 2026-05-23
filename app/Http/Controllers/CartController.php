<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $existing = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($existing) {
            $existing->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        if ($request->has('redirect') && $request->get('redirect') === 'checkout') {
            return redirect('/checkout');
        }

        return redirect()->back();
    }

    public function index()
    {
        $cart = Cart::join('products', 'carts.product_id', '=', 'products.id')

            ->where('carts.user_id', Auth::id())

            ->select(
                'carts.*',
                'products.name',
                'products.price',
                'products.image'
            )

            ->get();

        return view('mobile.cart', compact('cart'));

    }

    public function remove($id)
    {
        Cart::find($id)->delete();
        return redirect('/cart');
    }
    public function increase($id)
    {
        $cart = Cart::find($id);
        $cart->quantity = $cart->quantity + 1;
        $cart->save();
        return redirect('/cart');
    }
    public function decrease($id)
    {
        $cart = Cart::find($id);
        if ($cart->quantity > 1) {
            $cart->quantity = $cart->quantity - 1;
            $cart->save();
        }
        return redirect('/cart');
    }
}
