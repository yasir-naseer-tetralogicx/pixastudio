<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AdminController@showDashboard')->name('dashboard');

//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth.shopify'])->name('home');

Route::get('/customers', 'AdminController@getCustomers')->name('customers');
Route::get('/orders', 'AdminController@getOrders')->name('orders');
Route::get('/products', 'AdminController@getProducts')->name('products');
Route::get('/products/{id}', 'AdminController@getSingleProduct')->name('product');
Route::resource('designs', 'DesignController');
Route::post('/designs/colour/{id}', 'DesignController@showColorDesignPage')->name('show.colour.page');
Route::post('/upload/crop/{id}', 'AdminController@uploadCrop')->name('upload.crop');

Route::post('/upload/color/design', 'DesignController@uploadColorDesign')->name('upload.design');
Route::get('/get/color/design', 'DesignController@getColorDesign')->name('get.design');
Route::get('/color-designs/{id}', 'AdminController@getColorDesignForCustomer');
Route::get('/designed/images', 'DesignController@getDesignedImages')->name('designed.images');

Route::get('/get/designs', 'DesignController@getAllDesign');

