<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\order;
use App\eating;
use App\eating_order;

class ControllerPage extends Controller
{
    function goToHomePage() {
    	$setting = App\setting::all();
    	// $count = App\category::count();
    	// for ($i = 1; $i <= $count; $i++) { 
    	// 	$eating[$i] = App\category::find($i)->relate;
    		
    	// }
    	// $category = App\category::all();
        $category = App\category::all();

    	return view('layouts.master', ['setting' => $setting, 'category' => $category]);
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
    public function order(Request $request)
    {   
            $order = new order;
            $eating = eating::find($request->idEating);
            $order->user_id = Auth::user()->id;
            $order->total_money = $eating->cost * $request->quantity;
            $order->save();
            $eating_order = new eating_order;
            $eating_order->order_id = $order->id;
            $eating_order->eating_id = $request->idEating;
            $eating_order->quantity = $request->quantity;
            $eating_order->save();
            // $message = "Successed! Click OK button to back to HOMEPAGE.";
            // echo "<script type='text/javascript'>alert('$message')</script>";
            return redirect()->route('home')->with('notification', 'Successed!Click OK button go to HOMEPAGE.');
            // echo $request->idEating;
    }
}
