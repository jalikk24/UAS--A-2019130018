<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::all();
        return view('vieworder', compact('orders'));
    }

    public function createOrder()
    {
        $orders = Order::all();
        $menus = Menu::all();
        return view('order', compact('menus', 'orders'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'max:255',
            'status' => 'max:255'
        ]);

        $order = Order::create($validateData);

        $order->save();

        $request->session()->flash('success', "Successfully adding {$validateData['id']}!");
        return redirect()->route('index');
    }
}
