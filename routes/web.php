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
	Route::group(['prefix' => 'product'], function() {
		Route::get('add', 'productController@addProduct')->name('addProduct');
		Route::get('showList', 'productController@showListProduct')->name('showListProduct');
		Route::get('edit/{id?}', 'productController@editProduct')->name('editProduct');
		Route::post('update/{id?}', 'productController@updateEating')->name('updateEatingInfo');
		Route::post('addEating', 'productController@addEating')->name('addEating');
		Route::get('deleteEating/{id?}', 'productController@deleteEating')->name('deleteEating');
	});

	Route::group(['prefix' => 'user'], function() {
		Route::get('showList', 'userController@showListUser')->name('showListUser');
		Route::get('add', 'userController@addUser')->name('addUser');
		Route::get('edit/{id?}', 'userController@editUser')->name('editUser');
		Route::post('update/{id?}', 'userController@updateUser')->name('updateUserInfo');
		Route::post('addAccount', 'userController@addAccount')->name('addAccount');
	});

	Route::group(['prefix' => 'category'], function() {
		Route::get('showList', 'cateController@showListCate')->name('showListCate');
		Route::get('add', 'cateController@addCate')->name('addCate');
		Route::get('edit/{id?}', 'cateController@editCate')->name('editCate');
		Route::post('update/{id?}', 'cateController@updateCate')->name('updateCate');
		Route::post('addCate', 'cateController@addCategory')->name('addCategory');
		Route::get('delete/{id?}', 'cateController@deleteCate')->name('deleteCate');
	});

	Route::group(['prefix' => 'order'], function () {
		Route::get('showList', 'orderController@showListOrder')->name('showListOrder');
		Route::get('edit/{id?}', 'orderController@editOrder')->name('editOrder');
		Route::post('update/{id?}', 'orderController@updateOrder')->name('updateOrderInfo');
	});
});

use App\category;
use App\eating;
use App\order;
// use App\User;

Route::get('demo', function () {
	// Model Category
	// 
	// $category = category::find(2);
	// // var_dump($category);
	// echo $category->categoryName."<br>";
	// foreach ($category->eating as $eating) {
	// 	echo $eating->eatingName."<br>";
	// }
	// 
	// Model User
	// 
	// $user = App\User::find(1);
	// echo $user->name."<br>";
	// // var_dump($user);
	// foreach ($user->order as $order) {
	// 	echo $order->id." ".$order->total_money."<br>";
	// }
	// 
	// Model order
	// 
	// $order = order::find(1);
	// dd($order->eating);
	// foreach ($order->eating as $eating) {
		
		// echo "<br>";
	// 	echo $eating->eatingName."<br>";
	// }
});
