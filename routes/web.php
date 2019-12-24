<?php

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
    return view('welcome');
});

Route::middleware('auth')->group(function (){

    // GET Routes.
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/products', 'ProductController@read')->name('products');
    Route::get('/product-edit/{id}', 'ProductController@edit');
    Route::get('/product-delete/{id}', 'ProductController@delete');

    // POST Routes.
    Route::post('/addproduct', 'ProductController@create');
    Route::post('/editproduct/{id}', 'ProductController@update');

});

Auth::routes();