<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReciptController;
use App\Http\Controllers\OrderManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use  App\Http\Middleware\OrderMiddleware;
use Illuminate\Support\Facades\App;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/m', function () {
    return view('not');
});


Route::get('/login/{local}', function ($locale) {
    App::setLocale($locale);
    return view('auth.login');
});


Route::get('/m', function () {
    return view('not');
});


Route::get('/',[MainController::class,'index']);
//Route::resource('/product', ProductController::class);
Route::group(['middleware' => ['permission:admin']], function () {
    
    Route::get('/dashboard',[ DashboardController::class,'index']);
    Route::get('/details/{id}',[ DashboardController::class,'details']);
    Route::get('/status',[OrderManagementController::class,'index']);
    Route::get('/current',[OrderManagementController::class,'current']);

    Route::post('/product',[ProductController::class,'store']);
    Route::get('/product/create',[ProductController::class,'create']);
    Route::put('/product/{product}',[ProductController::class,'update']);
    Route::get('/product/{product}/edit',[ProductController::class,'edit']);
    Route::get('/product/{product}/destroy',[ProductController::class,'destroy']);
    Route::get('/product',[ProductController::class,'index']);
    
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::get('/category/create',[CategoryController::class,'create']);
    Route::get('/category/{category}',[CategoryController::class,'show']);
    Route::get('/category/{category}/edit',[CategoryController::class,'edit']);
    Route::put('/category/{category}',[CategoryController::class,'update']);
    Route::get('/category/{category}/destroy',[CategoryController::class,'destroy']);
});
Route::get('/product/{product}',[ProductController::class,'show']);

Route::post('add_to_cart/{product_id}',[CartController::class,'add_to_cart'])->name('addtocart');
Route::get('removecart/{id}/destroy ',[CartController::class,'removecart']);
Route::get('/list',[CartController::class,'cartlist']);

Route::get('/ordernow',[OrderController::class,'index'])->middleware('m');
Route::post('/orderplace',[OrderController::class,'Orderplace'])->middleware('m');

Route::get('/recipt/{order_id}',[ReciptController::class,'index'])->name('recipt');

Route::get('/search',[SearchController::class,'search']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

