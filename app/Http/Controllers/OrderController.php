<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id')->get();

        return response()->json(['orders' => $orders]);
    }

    public function show(Order $order)
    {
        return response()->json(['order' => $order]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|numeric',
            'order_number' => 'required|string',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric'
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_number' => $request->order_number,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount
        ]);

        return response()->json(['order' => $order, 'message' => 'A new order has been added to the list of orders']);
    }

    public function update(Order $order, Request $request)
    {
        $request->validate([
            'customer_id' => 'required|numeric',
            'order_number' => 'required|string',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric'
        ]);

        $order->update($request->all());

        return response()->json(['order' => $order, 'message' => "Order $order->order_number has been updated successfully"]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => "Order $order->order_number has been deleted successfully"]);
    }
}
