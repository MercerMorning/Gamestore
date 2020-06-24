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

Route::post('/image/upload', 'ImageController@upload')->name('image.upload');

Route::get('/', 'GoodsController@index')->name('home');

//Route::get('/home', function () {
//    return view('welcome');
//});

Route::get('/goods', 'GoodsController@index')->name('goods');
Route::get('/goods/goodpage/{id}', 'GoodsController@goodpage')->name('goods.goodpage');
Route::get('/goods/categories/{id}', 'GoodsController@categories')->name('goods.categories');
Route::get('/goods/order/{id}', 'GoodsController@order')->name('goods.order');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
//    Route::get('/', 'AdminController@act');
    Route::get('page', 'AdminController@index')->name('goods.admin');
    Route::get('create', 'AdminController@create')->name('goods.create');
    Route::post('add', 'AdminController@add')->name('goods.add');
    Route::get('edit/{good}', 'AdminController@edit')->name('goods.edit');
    Route::post('save/{id}', 'AdminController@save')->name('goods.save');
    Route::get('delete/{id}', 'AdminController@delete')->name('goods.delete');

    Route::post('categories/add', 'AdminController@categoryAdd')->name('categories.add');
    Route::get('categories/create', 'AdminController@categoryCreate')->name('categories.create');
    Route::get('categories/edit/{category}', 'AdminController@categoryEdit')->name('categories.edit');
    Route::post('categories/save/{id}', 'AdminController@categorySave')->name('categories.save');
    Route::get('categories/delete/{id}', 'AdminController@categoryDelete')->name('categories.delete');
    //Route::post('categories/save/{id}', 'AdminController@categorySave')->name('categories.save');

    Route::get('addresses/change', 'AdminController@changeAddress')->name('addresses.change');
    Route::post('addresses/save/{id}', 'AdminController@saveAddress')->name('addresses.save');

});


//Route::group(['prefix' => 'books', 'middleware' => 'auth'], function(){
//    Route::get('/', 'BookController@index')->name('books');
//    Route::get('create', 'BookController@create')->name('books.create');
//    Route::get('edit/{book}', 'BookController@edit')->name('books.edit');
//    Route::post('add', 'BookController@add')->name('books.add');
//    Route::post('save/{id}', 'BookController@save')->name('books.save');
//    Route::get('delete/{id}', 'BookController@delete')->name('books.delete');
//});

//Auth::routes();
//Route::get('/home', 'HomeController@index');
//
//Route::group(['prefix' => 'books', 'middleware' => 'auth'], function () {
//    Route::get('/', 'BookController@index');
//    Route::get('create', 'BookController@create')->name('books.create');
//    Route::get('edit/{book}', 'BookController@edit')->name('books.edit');
//    Route::post('add', 'BookController@add')->name('books.add');
//    Route::post('save/{id}', 'BookController@save')->name('books.save');
//    Route::get('delete/{id}', 'BookController@delete')->name('books.delete');
//});

