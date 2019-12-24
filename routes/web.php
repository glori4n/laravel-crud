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

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // GET Users
    Route::get('/users', 'UserController@read')->name('users');
    Route::get('/users-list', 'UserController@index')->name('users-list');
    Route::get('/user-edit/{id}', 'UserController@edit');
    Route::get('/user-delete/{id}', 'UserController@delete');

    // POST Users.
    Route::post('/adduser', 'UserController@create');
    Route::post('/edituser/{id}', 'UserController@update');

    // GET Products
    Route::get('/products', 'ProductController@read')->name('products');
    Route::get('/products-list', 'ProductController@index')->name('products-list');
    Route::get('/product-edit/{id}', 'ProductController@edit');
    Route::get('/product-delete/{id}', 'ProductController@delete');

    // POST Products.
    Route::post('/addproduct', 'ProductController@create');
    Route::post('/editproduct/{id}', 'ProductController@update');

});

Auth::routes();