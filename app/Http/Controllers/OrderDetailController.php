<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::orderBy('id')->get();

        return response()->json(['order_details' => $orderDetails]);
    }

    public function show(OrderDetail $orderDetail)
    {
        return response()->json(['order_details' => $orderDetail]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|numeric',
            'menu_item_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);

        $orderDetail = OrderDetail::create([
            'order_id' => $request->order_id,
            'menu_item_id' => $request->menu_item_id,
            'quantity' => $request->quantity,
            'subtotal' => $request->subtotal
        ]);

        return response()->json(['order_details' => $orderDetail, 'message' => 'A new order detail has been placed']);
    }

    public function update(OrderDetail $orderDetail, Order $order, Request $request)
    {
        $request->validate([
            'order_id' => 'required|numeric',
            'menu_item_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);

        $orderDetail->update($request->all());

        return response()->json(['order_details' => $orderDetail, 'message' => "id: $orderDetail->order_id has been updated successfully"]);
    }

    public function destroy(OrderDetail $orderDetail, Order $order)
    {
        $orderDetail->delete();

        return response()->json(['message' => "id: $orderDetail->menu_item_id has been deleted successfully"]);
    }
}
