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

Route::get('/', function(){
  return view('welcome');
});

Route::get('/about', 'AboutController@jony');
Route::get('/add/product', 'ProductController@addproduct');
Route::post('/product/insert', 'ProductController@productinsert');
Route::get('/product/delete/{product_id}', 'ProductController@productdelete');
Route::get('/product/edit/{product_id}', 'ProductController@productedit');
Route::post('/product/update', 'ProductController@productupdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
