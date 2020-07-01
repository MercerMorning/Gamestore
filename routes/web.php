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

use Illuminate\Support\Facades\Route;

Route::get('/', 'GoodsController@index')->name('home');
Route::get('/goods', 'GoodsController@index')->name('goods');
Route::get('/goods/goodpage/{id}', 'GoodsController@single')->name('goods.goodpage');
Route::get('/goods/categories/{id}', 'GoodsController@categories')->name('goods.categories');
Route::get('/goods/order/{id}', 'GoodsController@order')->name('goods.order');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('page', 'AdminController@index')->name('goods.admin');

    Route::get('create', 'GoodsController@create')->name('goods.create');
    Route::post('add', 'GoodsController@add')->name('goods.add');
    Route::get('edit/{good}', 'GoodsController@edit')->name('goods.edit');
    Route::post('save/{id}', 'GoodsController@save')->name('goods.save');
    Route::get('delete/{id}', 'GoodsController@delete')->name('goods.delete');

    Route::post('categories/add', 'CategoriesController@add')->name('categories.add');
    Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
    Route::get('categories/edit/{category}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('categories/save/{id}', 'CategoriesController@save')->name('categories.save');
    Route::get('categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');

    Route::get('addresses/change', 'AddressesController@change')->name('addresses.change');
    Route::post('addresses/save/{id}', 'AddressesController@save')->name('addresses.save');

});

