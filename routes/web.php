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

// Go to HomePage
Route::get('/', ['as' => 'home', 'middleware' => 'index','uses' => 'ControllerPage@goToHomePage']);

// Login 
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('postForm', ['as' => 'postForm', 'uses' => 'LoginController@postLogin']);

// Logout
Route::get('logout', ['as' => 'logout', 'uses' => 'ControllerPage@logout']);

//Order 
Route::match(['get', 'post'],'order', ['as' => 'order', 'middleware' => 'order', 'uses' => 'ControllerPage@order']);

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function () {
	Route::get('/', function() {
		return view('admin.layouts.index');
	})->name('homePageAdmin');

	Route::resource('product', 'ProductCtrl', ['except' => ['show']]);

	Route::resource('user', 'UserCtrl', ['except' => ['create', 'show', 'destroy']]);

	Route::resource('category', 'CategoryCtrl', ['except' => ['show', 'create']]);

	Route::resource('order', 'OrderCtrl', ['except' => ['create', 'show', 'store', 'destroy']]);
});