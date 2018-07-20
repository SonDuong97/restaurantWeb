<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;


class ControllerPage extends Controller
{
    function goToHomePage() {
    	$setting = App\setting::all();
    	$count = App\category::count();
    	for ($i = 1; $i <= $count; $i++) { 
    		$eating[$i] = App\category::find($i)->relate;
    		
    	}
    	$category = App\category::all();

    	return view('layouts.master', ['setting' => $setting, 'category' => $category, 'eating' => $eating]);
    }

    function login() {
    	return view('login');
    }

    function logout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }

    // public function __construct() {
    // 	$this->middleware('auth');
    // }

    // public function getIndex() {
    // 	return 'Đăng nhập thành công!';
    // }
}
