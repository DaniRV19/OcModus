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

    public function cancel(\App\Models\Order $order)
    {
        // Asegurarse de que el pedido pertenezca al usuario logueado
        if ($order->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'No autorizado.');
        }

        $order->status = 'canceled';
        $order->save();

        return redirect()->back()->with('success', 'Pedido cancelado correctamente.');
    }


    public function myOrders()
    {
        // Obtener los pedidos del usuario autenticado
        $orders = \App\Models\Order::where('user_id', auth()->id())->latest()->simplePaginate(5);
        return view('user.orders.index', compact('orders'));
    }

}
