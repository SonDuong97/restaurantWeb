<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Validator;

class orderController extends Controller
{
    public function showListOrder()
    {	
    	$orders = order::all();
    	return view('admin.order.showListOrder', ['orders' => $orders]);
    }

    public function editOrder($id)
    {
    	$order = order::find($id);
    	return view('admin.order.editOrder', ['order' => $order]);
    }

    public function updateOrder(Request $request, $id)
    {
        $order = order::find($id);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('editOrder', ['id' => $id])->with('notification', 'Updating order is successed.');
    }
}
