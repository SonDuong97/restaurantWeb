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
        $categories = category::all();
    	return $categories;
    }

    public function addCate()
    {
    	return view('admin.category.addCate');
    }

    public function editCate($id)
    {
        $category = category::findOrFail($id);
    	return $category;
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
            return response(['status' => 'error', 'errors' => $validate->errors()]);
        }
        $category = category::find($id);

        $category->categoryName = $request->txtCateName;
        $category->save();
        return response(['result' => 'successed'], 200);

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
            return response()->json(['status' => 'error', 'errors' => $validate->errors()]);
        }

        $category = new category;
        $category->categoryName = $request->txtCateName;
        $category->save();
        return response(['result' => 'successed'], 200);
    }
    public function deleteCate($id)
    {
        $category = category::findOrFail($id);
        if(count($category->eating) == 0) {
            $category->delete();
            return response()->json(['result' => 'successed']);
        } else {
            return response()->json(['errors' => 'Exist product in this category. Can\'t delete']);
        }
        // return response()->json(['result' => count($category->eating)]);
        // $category->delete();

        // return response([]);
    }
}
