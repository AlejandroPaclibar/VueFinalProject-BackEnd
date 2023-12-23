<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentTransactionController extends Controller
{
    public function index()
    {
        $paymentTransactions = PaymentTransaction::orderBy('id')->get();

        return response()->json(['payment_transactions' => $paymentTransactions]);
    }

    public function show(PaymentTransaction $paymentTransaction)
    {
        return response()->json(['payment_transaction' => $paymentTransaction]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'payment_method' => 'required'
        ]);

        $paymentTransaction = PaymentTransaction::create([
            'order_id' => $request->order_id,
            'payment_date' => $request->payment_date,
            'payment_amount' => $request->payment_amount,
            'payment_method' => $request->payment_method
        ]);

        return response()->json(['payment_transaction' => $paymentTransaction, 'message' => 'A new payment has been added to the list of transactions']);
    }

    public function update(PaymentTransaction $paymentTransaction, Request $request)
    {
        $request->validate([
            'order_id' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'payment_method' => 'required'
        ]);

        $paymentTransaction->update($request->all());

        return response()->json(['payment_transaction' => $paymentTransaction, 'message' => "id: $paymentTransaction->id has been updated successfully"]);
    }

    public function destroy(PaymentTransaction $paymentTransaction)
    {
        $paymentTransaction->delete();

        return response()->json(['message' => "id: $paymentTransaction->id has been deleted successfully"]);
    }
}
