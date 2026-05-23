<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        $cart = Cart::join(
            'products',
            'carts.product_id',
            '=',
            'products.id'
        )

            ->where('carts.user_id', Auth::id())

            ->select(
                'carts.*',
                'products.name',
                'products.price'
            )

            ->get();

        $total = 0;

        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }

        return view(
            'mobile.checkout',
            compact('total')
        );
    }

    public function placeorder(Request $request)
{

    // Get Cart Items
    $cartItems = Cart::where(
        'user_id',
        Auth::id()
    )->get();

    // Reduce Product Stock
    foreach($cartItems as $item)
    {
        $product = Product::find(
            $item->product_id
        );

        if($product)
        {
            $product->stock =
            $product->stock - $item->quantity;

            $product->save();
        }
    }

    // Create Order
    Order::create([

        'user_id' => Auth::id(),

        'name' => $request->name,

        'email' => $request->email,

        'phone' => $request->phone,

        'address' => $request->address,

        'total' => $request->total,

        'status' => 'Pending'

    ]);

    session()->flash(
        'success',
        '🎉 New Order Received'
    );

    // Empty Cart
    Cart::where(
        'user_id',
        Auth::id()
    )->delete();

    return redirect('/myorders')

        ->with('order', $request->all())

        ->with(
            'success',
            '🎉 Order Placed Successfully'
        );
}
    public function myorders()
    {
        $orders = Order::where(
            'user_id',
            Auth::id()
        )

            ->latest()

            ->get();

        return view(
            'mobile.myorders',
            compact('orders')
        );
    }
    public function adminorders()
    {
        $orders = Order::latest()->get();

        return view(
            'admin.orders',
            compact('orders')
        );
    }
    public function status($id)
    {
        $order = Order::find($id);

        $order->status = 'Delivered';

        $order->save();

        return redirect()->back();
    }
    public function exportpdf()
{
    $orders = Order::all();

    $pdf = Pdf::loadView(
        'admin.pdf',
        compact('orders')
    );

    return $pdf->download('orders.pdf');
}
}
