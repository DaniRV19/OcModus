<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->simplePaginate(5);

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    public function show(order $order)
    {
        return view('admin.orders.show', ['order' => $order]);
    }

    public function destroy(order $order)
    {
        $order->delete();

        return redirect('/orders');
    }
}
