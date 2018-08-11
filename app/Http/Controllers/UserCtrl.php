<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->txtUser;
        $user->save();
        return response()->json(['result' => 'successed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
