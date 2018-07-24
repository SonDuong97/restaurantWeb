<?php

namespace App\Http\Controllers;

use App\eating;
use App\category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class productController extends Controller
{
    public function showListProduct()
    {
        $eating = eating::all();
    	return view('admin.product.showListProduct', ['eating' => $eating]);
    }

    public function addProduct()
    {
        $categories = category::all();

    	return view('admin.product.addProduct', ['categories' => $categories]);
    }

    public function editProduct($id)
    {
        $eating = eating::find($id);
        $categories = category::all();
    	return view('admin.product.editProduct', ['eating' => $eating, 'categories' => $categories]);
    }

    public function addEating(Request $request)
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

        $eating = new eating;

        $eating->eatingName = $request->txtName;
        $eating->cost = $request->txtPrice;
        $eating->description = $request->txtIntro;
        $eating->category_id = $request->cateId;
        $eating->save();

        return redirect()->route('addProduct')->with('notification', 'The adding product is successed.');
    }

    public function updateEating(Request $request, $id)
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

    public function deleteEating($id)
    {
        $eating = eating::find($id);

        $eating->delete();
        return redirect()->route('showListProduct');
    }
}
