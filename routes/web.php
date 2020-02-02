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

// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/','HelloController@index');

Route::get('contact/us','HelloController@contact')->name('contact');
Route::get('about/us','HelloController@about')->name('about');
Route::get('write/post','BoloController@writepost')->name('writepost');

//Category crud here
Route::get('all/category','BoloController@allcategory')->name('all.category');
Route::get('add/category','BoloController@addcategory')->name('add.category');
Route::post('store/category','BoloController@storecategory')->name('store.category');
Route::get('view/category/{id}','BoloController@viewcategory');
Route::get('delete/category/{id}','BoloController@deletecategory');
Route::get('edit/category/{id}','BoloController@editcategory');
Route::post('update/category/{id}','BoloController@updatecategory');

//Post crud here
Route::get('write/post','PostController@writepost')->name('writepost');
Route::post('store/post','PostController@storePost')->name('store.post');
Route::get('all/post','PostController@allpost')->name('all.post');
Route::get('view/post/{id}','PostController@viewpost');
Route::get('edit/post/{id}','PostController@editpost');
Route::get('delete/post/{id}','PostController@deletepost');
Route::post('update/post/{id}','PostController@updatepost');

