<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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


//for users
Route::get('/redirect', [HomeController::class, 'redirect']);  // if user or admin

Route::get('/', [HomeController::class, 'index']);  // route for user

Route::get('/search', [HomeController::class, 'search']);  // search function
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);  // add cart function
Route::get('/showcart', [HomeController::class, 'showcart']);  // show cart
Route::get('/delete/{id}', [HomeController::class, 'delete']);  // delete in cart
Route::post('/order', [HomeController::class, 'order']);  // store order in cart
Route::get('/transaction', [HomeController::class, 'transaction']);  // Order
Route::get('/history', [HomeController::class, 'history']);  // Transaction
Route::get('/drinks', [HomeController::class, 'drinks']);  // drinks
Route::get('/burger', [HomeController::class, 'burger']);  // burger
Route::get('/chicken', [HomeController::class, 'chicken']);  // chicken
Route::get('/add_on', [HomeController::class, 'add_on']);  // add_on
Route::get('/dessert', [HomeController::class, 'dessert']);  // dessert
Route::get('/side_menu', [HomeController::class, 'side_menu']);  // side_menu





// for admin
Route::get('/product', [AdminController::class, 'product']);  // admin to view product
Route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);  // admin to upload
Route::get('/showproduct', [AdminController::class, 'showproduct']); //show list product 

Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']); //delete prod using id

Route::get('/updateview/{id}', [AdminController::class, 'updateview']); //update ui
Route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']); //update ui

Route::get('/showorder', [AdminController::class, 'showorder']); //show order 
Route::get('/updatestatus/{id}', [AdminController::class, 'updatestatus']); //update order 
Route::get('/delivered', [AdminController::class, 'delivered']); //show order
                          




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
