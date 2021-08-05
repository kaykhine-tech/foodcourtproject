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
Route::get('/', function () {
    return redirect()->route('frontend.home');
});



// CRUD
Route::middleware('auth','role:admin')->group(function(){
Route::resource('categories', 'CategoryController'); // 7 methods
Route::resource('items', 'ItemController'); // 7 methods

});
Route::resource('orders', 'OrderController'); // 7 methods

// Frontend
Route::prefix('frontend')->group(function(){
Route::get('home', 'FrontendController@home')->name('frontend.home');
Route::get('about', 'FrontendController@about')->name('frontend.about');
Route::get('contact', 'FrontendController@contact')->name('frontend.contact');
Route::get('cart', 'FrontendController@cart')->name('frontend.cart');
Route::get('menu', 'FrontendController@menu')->name('frontend.menu');


});

// Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
