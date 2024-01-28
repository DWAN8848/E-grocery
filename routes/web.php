<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatrgoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PagesController::class,'home'])->name('home');

Route::get('/aboutus',[PagesController::class,'about'])->name('aboutus');

Route::get('/products',[PagesController::class,'products'])->name('products');

Route::get('/contact',[PagesController::class,'contact'])->name('contact');

//viewproduct
Route::get('/viewproduct/{product}',[PagesController::class,'viewproduct'])->name('viewproduct');

//userlogin and register
Route::get('/userlogin',[UserController::class,'userlogin'])->name('userlogin');
Route::get('/userregister',[UserController::class,'userregister'])->name('user.register');
Route::post('/userregister',[UserController::class,'userstore'])->name('user.register');

//userprofile
Route::get('/userprofile/{id}',[UserController::class,'userprofile'])->name('userprofile');
Route::get('/editprofile/{id}',[UserController::class,'editprofile'])->name('editprofile');
Route::post('/upadteprofile',[UserController::class,'userupdate'])->name('userprofile.update');

//search
Route::get('/search',[PagesController::class,'search'])->name('search');

//contact
Route::post('/contact/submit',[ContactController::class,'submit'])->name('contact.submit');

//khalti
Route::get('/showkhalti',[OrderController::class,'showkhalti'])->name('showkhalti');

Route::post('/khaltiverify',[OrderController::class,'khaltiverify'])->name('khaltiverify');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');
   




Route::middleware(['auth'])->group(function(){
    //cart
    Route::get('/viewcart',[CartController::class,'index'])->name('cart.index');
    Route::post('/viewcart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/viewcart/{id}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
    Route::post('/viewcart/{id}/update',[CartController::class,'update'])->name('cart.update');


    //order
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');


    //checkout
    Route::get('/chechout',[CartController::class,'checkout'])->name('cart.checkout');

    //vieworders
    Route::get('/vieworder',[PagesController::class,'order'])->name('user.order');

});

Route::middleware('auth','isadmin')->group(function () {

   
         //Category
    Route::get('/category',[CatrgoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CatrgoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CatrgoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CatrgoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CatrgoryController::class,'update'])->name('category.update');
    Route::post('/category/destroy',[CatrgoryController::class,'destroy'])->name('category.destroy');

     //Product
     Route::get('/product',[ProductController::class,'index'])->name('product.index');
     Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
     Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
     Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
     Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
     Route::post('/product/destroy',[ProductController::class,'destroy'])->name('product.destroy');
     

    //order
    Route::get('/order',[OrderController::class,'index'])->name('order.index');
    Route::get('/order/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
    Route::post('/order/{id}/update',[OrderController::class,'update'])->name('order.update');
    Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');
    Route::get('/order/{id}/details',[OrderController::class,'details'])->name('order.detail');
    Route::get('/order/destroy',[OrderController::class,'destroy'])->name('order.destroy');


    //userview
    Route::get('/Userview',[UserController::class,'index'])->name('userview.index');

    //add admin
    Route::get('/Userview/create',[UserController::class,'createadmin'])->name('Userview.createadmin');
    Route::post('/Admin/store',[UserController::class,'userstore'])->name('admin.store');

    //viewadminprofile
    Route::get('/adminprofile',[UserController::class,'adminprofile'])->name('adminprofile.index');
    // Route::post('/adminprofile/updateprofile',[UserController::class,'userupdate'])->name('userprofile.update');
    Route::get('/adminprofile/edit/{id}',[UserController::class,'adminedit'])->name('adminprofile.edit');

   //dashboard
   Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
   Route::post('/dashboard/changemonth',[DashboardController::class,'changemonth'])->name('changemonth'); 


    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
