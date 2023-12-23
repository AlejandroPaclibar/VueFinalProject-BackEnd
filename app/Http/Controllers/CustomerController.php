<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id')->get();

        return response()->json(['customers' => $customers]);
    }

    public function show(Customer $customer)
    {
        return response()->json(['customer' => $customer]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return response()->json(['customer' => $customer, 'message' => 'A new customer has been added to the deathlist']);
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $customer->update($request->all());

        return response()->json(['customer' => $customer, 'message' => "$customer->name has been updated successfully"]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => "$customer->name has been deleted successfully"]);
    }
}
