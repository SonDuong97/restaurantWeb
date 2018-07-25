<?php

namespace App\Http\Controllers;

use App\category;
use App\eating;
use Validator;
use Illuminate\Http\Request;

class cateController extends Controller
{
    public function showListCate()
    {
        $category = category::all();
    	return view('admin.category.showListCate', ['category' => $category]);
    }

    public function addCate()
    {
    	return view('admin.category.addCate');
    }

    public function editCate($id)
    {
        $category = category::find($id);
    	return view('admin.category.editCate', ['category' => $category]);
    }

    public function updateCate(Request $request, $id)
    {
        // echo "ID:". $request->txtCateName;
        $rules = [
            'txtCateName' => 'required|unique:category,categoryName'
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The category name is duplicated.'
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $category = category::find($id);

        $category->categoryName = $request->txtCateName;
        $category->save();
        return redirect()->route('editCate', ['id' => $category->id])->with('notification', 'Editting category name is successed.');

    }

    public function addCategory(Request $request)
    {
        $rules = [
            'txtCateName' => 'required|unique:category,categoryName'
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The category name is duplicated.'
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $category = new category;
        $category->categoryName = $request->txtCateName;
        $category->save();
        return redirect()->route('addCate');
    }
    public function deleteCate($id)
    {
        $user = category::find($id);
        $user->delete();

        return redirect()->route('showListCate');
    }
}
