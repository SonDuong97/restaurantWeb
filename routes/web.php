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

// Go to HomePage
Route::get('index', ['as' => 'home', 'uses' => 'ControllerPage@goToHomePage']);

// Login 
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('postForm', ['as' => 'postForm', 'uses' => 'LoginController@postLogin']);

// Logout
Route::get('logout', ['as' => 'logout', 'uses' => 'ControllerPage@logout']);
