<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eating = eating::all();
        return $eating;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();

        // return view('admin.product.addProduct', ['categories' => $categories]);
        return $categories;
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
            'txtName' => 'required|max:100',
            'txtPrice' => 'required|numeric|min:0',
            'txtIntro' => 'required',
        ];

        $messages = [
            'txtName.required' => 'A eating\'name is required.',
            'txtName.max' => 'The max length is 100.',
            'txtPrice.required' => 'A eating\'price is required.',
            'txtPrice.numeric' => 'Price is a number.',
            'txtPrice.min' => 'Min price is 0.',
            'txtIntro.required' => 'A eating\'intro is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }
        $eating = new eating;

        $eating->eatingName = $request->txtName;
        $eating->cost = $request->txtPrice;
        $eating->description = $request->txtIntro;
        $eating->category_id = $request->cateId;
        $eating->save();
        return response([
            'result' => 'success'
        ], 200);
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
        $rules = [
            'txtName' => 'required|max:100',
            'txtPrice' => 'required|numeric|min:0',
            'txtIntro' => 'required',
        ];

        $messages = [
            'txtName.required' => 'A eating\'name is required.',
            'txtName.max' => 'The max length is 100.',
            'txtPrice.required' => 'A eating\'price is required.',
            'txtPrice.numeric' => 'Price is a number.',
            'txtPrice.min' => 'Min price is 0.',
            'txtIntro.required' => 'A eating\'intro is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eating = eating::find($id);

        $eating->eatingName = $request->txtName;
        $eating->cost = $request->txtPrice;
        $eating->description = $request->txtIntro;
        $eating->category_id = $request->cateId;
        $eating->save();

        $categories = category::all();
        return redirect()->route('editProduct', ['eating' => $eating, 'categories' => $categories])->with('notification', 'The adding product is successed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eating = eating::find($id);

        $eating->delete();
        return redirect()->route('showListProduct');
    }
}
