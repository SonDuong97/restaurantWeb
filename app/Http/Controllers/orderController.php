<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Validator;
use App\User;
use App\Http\Resources\OrderResource;

class orderController extends Controller
{
    public function showListOrder()
    {	
    	// $users = order::all();

    	return OrderResource::collection(order::all());
    }

    public function editOrder($id)
    {
    	$order = order::findOrFail($id);
    	return new OrderResource($order);
    }

    public function updateOrder(Request $request, $id)
    {
        $order = order::find($id);

        $order->status = $request->status;
        $order->save();

        return response()->json(['result' => 'Successed']);
    }
}
