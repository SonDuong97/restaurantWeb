<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use App;
class LoginController extends Controller
{
    
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	// $data = App\User::all();
    	// // var_dump($data);
    	// foreach ($data as $user) {
    	// 	// if ((strcmp($user->email, $request->email) == 0) && (strcmp($user->password, $request->password) == 0)){
    	// 	// 	return redirect()->route('home')->with('username', $user->name);
    	// 	// }
    	// 	if (Auth::attempt(['name' => $user->name]))
    	// }
    	// 
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:3'
        ];
        $messages = [
            'required' => ':attribute is required.',
            'email' => ':attribute is email.',
            'min' => 'The length of :attribute is :min',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                if (strcmp($user->email, "duongson29111997@gmail.com") == 0)
                    return redirect()->route('showListProduct');
                else
                    return redirect()->route('home');           // echo "hello";;
            } else {
                // echo "k dc";
                return redirect()->back()->with('notification', 'Email and password is incorrect')->withInput();
                // return redirect()->back();
            }
        }
    	
    	// echo "hello".$request->email;
    }
    // 
    // public function postLogin(Request $request) {
    // 	$rules = [
    // 		'email' =>'required|email',
    // 		'password' => 'required|min:8'
    // 	];
    // 	$messages = [
    // 		'email.required' => 'Email là trường bắt buộc',
    // 		'email.email' => 'Email không đúng định dạng',
    // 		'password.required' => 'Mật khẩu là trường bắt buộc',
    // 		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    // 	];
    // 	$validator = Validator::make($request->all(), $rules, $messages);

    // 	if ($validator->fails()) {
    // 		return redirect()->back()->withErrors($validator)->withInput();
    // 	} else {
    // 		$email = $request->input('email');
    // 		$password = $request->input('password');

    // 		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    // 			return redirect()->intended('/');
    // 		} else {
    // 			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    // 			return redirect()->back()->withInput()->withErrors($errors);
    // 		}
    // 	}
    // }
}