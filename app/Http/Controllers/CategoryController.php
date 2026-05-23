<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.addcategory');
    }

    public function store(Request $request)
    {
        Category::create([

            'name'=>$request->name

        ]);

        return redirect()->back()
        ->with('success',
        'Category Added');
    }

    public function index()
    {
        $category = Category::all();

        return view(
            'admin.categories',
            compact('category')
        );
    }
}