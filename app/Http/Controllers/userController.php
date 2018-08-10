<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class userController extends Controller
{
    public function addUser()
    {
    	return view('admin.user.addUser');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
    	return $user;
    }

    public function showListUser()
    {
        $users = User::all();
    	return $users;
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // if (strcmp($request->txtPass, $request->txtRePass) == 0) {
        //     $user->name = $request->txtUser;
        //     $user->password = bcrypt($request->txtPass);
        //     $user->save();
        //     return response()->json(['result' => 'successed']);
        // }
        $user->name = $request->txtUser;
        $user->save();
        return response()->json(['result' => 'successed']);
        // return response()->json(['status' => 'error', 'error' => 'The NewPassword and the ReNewPassword must be the same.']);
        
    }

    public function addAccount(Request $request)   
    {
        $rules = [
            'txtEmail' => 'required|unique:users,email|email',
            'txtUser' => 'required|max:190|',
            'txtPass' => 'required|min:3',
            'txtRePass' => 'required|same:txtPass'
        ];

        $messages = [
            'required' => 'The :attribute field is required',
            'max' => 'The :attribute max length field is :max',
            'min' => 'The :attribute min length field is :min',
            'email' => 'The :attribute is email.',
            'txtEmail.unique' => 'The :attribute is duplicate',
            'same' => 'The re-password field isn\'t same the password field.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $user = new User;
        $user->name = $request->txtUser;
        $user->password = bcrypt($request->txtPass);
        $user->email = $request->txtEmail;
        $user->save();
        return response()->json(['result' => 'successed']);

        // return redirect()->back()->withInput();
    }
}
