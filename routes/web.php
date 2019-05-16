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

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/login', 'ProductController@login')->name('products.login');
    Route::post('/login', 'ProductController@loginAdmin')->name('products.loginAdmin');
    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/create', 'ProductController@store')->name('products.store');
    Route::get('/logout', 'LogoutController@logout')->name('products.logout');
    Route::get('/{id}/delete', 'ProductController@delete')->name('products.delete');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('/', 'CartController@index')->name('carts.index');
    Route::get('/{id}', 'CartController@add')->name('carts.add');
    Route::get('/remove/{id}', 'CartController@remove')->name('carts.remove');
    Route::get('/1/remove', 'CartController@deleteCart')->name('carts.removeAll');
    Route::post('/{id}/update', 'CartController@update')->name('carts.update');
});