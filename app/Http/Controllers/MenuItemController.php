<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::orderBy('id')->get();

        return response()->json(['menu_items' => $menuItems]);
    }

    public function show(MenuItem $menuItem)
    {
        return response()->json(['menu_items' => $menuItem]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $menuItem = MenuItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json(['menu_items' => $menuItem, 'message' => 'A new item has been added to the list']);
    }

    public function update(MenuItem $menuItem, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $menuItem->update($request->all());

        return response()->json(['menu_items' => $menuItem, 'message' => "$menuItem->name has been updated successfully"]);
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return response()->json(['message' => "$menuItem->name has been deleted successfully"]);
    }
}
