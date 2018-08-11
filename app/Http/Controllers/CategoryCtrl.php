<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\eating;
use Validator;

class CategoryCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return $categories;
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
        $category = category::findOrFail($id);
        return $category;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        if(count($category->eating) == 0) {
            $category->delete();
            return response()->json(['result' => 'successed']);
        } else {
            return response()->json(['errors' => 'Exist product in this category. Can\'t delete']);
        }
    }
}
