<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/addproduct', [ProductController::class, 'create']);

    Route::post('/adddata', [ProductController::class, 'store']);

    Route::get('/display', [ProductController::class, 'index']);

    Route::get('/updatedata/{id}', [ProductController::class, 'edit']);

    Route::put('/editdata/{id}', [ProductController::class, 'update']);

    Route::get('/delete/{id}', [ProductController::class, 'destroy']);

});
//product par ckik kari to teni diatal khule
Route::get('/productdetails/{id}', [ProductController::class, 'show'])->middleware('auth');

// add to cart mate
Route::post('/addtocart/{id}', [CartController::class, 'add'])->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');

// card ni andar data +- and remove kava mate
Route::get('/cartremove/{id}', [CartController::class, 'remove'])->middleware('auth');

Route::get('/increaseqty/{id}', [CartController::class, 'increase'])->middleware('auth');

Route::get('/decreaseqty/{id}', [CartController::class, 'decrease'])->middleware('auth');


//review apva mate
Route::post('/addreview/{id}', [ReviewController::class, 'store'])->middleware('auth');


//Ored mate
Route::get('/checkout', [OrderController::class, 'checkout'])->middleware('auth');

Route::post('/placeorder', [OrderController::class, 'placeorder'])->middleware('auth');

//user પોતાના orders જોઈ શકે
Route::get('/myorders', [OrderController::class, 'myorders'])->middleware('auth');


//❤️ Wishlist System mate
Route::get('/wishlist',[WishlistController::class, 'index'])->middleware('auth');

Route::post('/addwishlist/{id}',[WishlistController::class, 'add'])->middleware('auth');

Route::get('/removewishlist/{id}',[WishlistController::class, 'remove'])->middleware('auth');


//Admin panel mate
Route::get('/admin',[AuthController::class,'admin'])->middleware('admin');

Route::get('/admin/products',
[ProductController::class,'adminProducts'])
->middleware('admin');

Route::get('/admin/orders',
[OrderController::class,'adminorders'])
->middleware('admin');

Route::get('/status/{id}',
[OrderController::class,'status'])
->middleware('admin');


Route::get('/admin/users',
[AuthController::class,'users'])
->middleware('admin');

Route::get('/deleteuser/{id}',
[AuthController::class,'deleteuser'])
->middleware('admin');

//pdf export krva mate
Route::get('/exportpdf',
[OrderController::class,'exportpdf'])
->middleware('admin');


//product ni cetegory mate
Route::get('/addcategory',
[CategoryController::class,'create']);

Route::post('/savecategory',
[CategoryController::class,'store']);

Route::get('/categories',
[CategoryController::class,'index']);

//dislay mate cetegory
Route::get('/category/{id}',
[ProductController::class,'category']);
