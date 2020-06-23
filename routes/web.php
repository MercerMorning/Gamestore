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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/goods', 'GoodsController@index');
Route::get('/goods/goodpage/{id}', 'GoodsController@goodpage')->name('goods.goodpage');

Auth::routes();

/*
Route::group(['prefix' => 'books', 'middleware' => 'auth'], function(){
    Route::get('/', 'BookController@index')->name('books');
    Route::get('create', 'BookController@create')->name('books.create');
    Route::get('edit/{book}', 'BookController@edit')->name('books.edit');
    Route::post('add', 'BookController@add')->name('books.add');
    Route::post('save/{id}', 'BookController@save')->name('books.save');
    Route::get('delete/{id}', 'BookController@delete')->name('books.delete');
});*/

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

