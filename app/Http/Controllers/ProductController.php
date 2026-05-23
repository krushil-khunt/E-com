<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $categories = Category::all();
        //➡ હાલ login user ના cart માં કેટલા items છે એ ગણે છે.
        $cartCount = Cart::where('user_id', Auth::id())->count();

        return view('mobile.disply', compact('product', 'cartCount','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("mobile.add", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
        ]);

        $product = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $product->image = $filename;
        }

        $product->name = $request->input("name");
        $product->brand = $request->input("brand");
        $product->price = $request->input("price");
        $product->description = $request->input("description");
        $product->ram = $request->input("ram");
        $product->storage = $request->input("storage");
        $product->category_id=$request->input('category_id');
        $product->stock=$request->input('stock');

        $product->save();

        if (Auth::user() && Auth::user()->role === 'admin') {
            return redirect('/admin/products')->with('success', 'Product added successfully.');
        }
        return redirect('/display')->with('product', $product)->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $product = Product::find($id);

    $reviews = \App\Models\Review::join(
        'users',
        'reviews.user_id',
        '=',
        'users.id'
    )

    ->where('product_id',$id)

    ->select('reviews.*','users.name')

    ->latest()

    ->get();

    return view('mobile.details',
        compact('product','reviews'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view("mobile.update", compact("product", "categories"));
    }

    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $product->image = $filename;
        }

        $product->name = $request->input("name");
        $product->brand = $request->input("brand");
        $product->price = $request->input("price");
        $product->description = $request->input("description");
        $product->ram = $request->input("ram");
        $product->storage = $request->input("storage");
        $product->category_id = $request->input("category_id");
         $product->stock=$request->input('stock');

        $product->update();

        if (Auth::user() && Auth::user()->role === 'admin') {
            return redirect('/admin/products')->with('success', 'Product updated successfully.');
        }
        return redirect('/display')->with("success", "Data Update Successfully");
    }

    public function adminProducts()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with("success", "Data Delete Successfully");
    }
    public function category($id)
{
    $product = Product::where('category_id',$id)->get();
    $categories = Category::all();
    $cartCount = Cart::where('user_id',Auth::id())->count();
    return view('mobile.disply',compact('product','categories','cartCount'));
}
}
