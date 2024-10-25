<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        // Fetch all orders with their statuses, ordered by ID descending
        $orders = Order::with('statuses')->orderBy('id', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

     
     public function search(Request $request) {
        $invoiceNumber = $request->input('invoice_number'); 
        $orders = Order::where('id', $invoiceNumber)->with('statuses')->get();
        
        return view('orders.index', compact('orders'));
    }

    public function create() {
        return view('orders.create');
    }

    public function store(Request $request) {
        Order::create($request->all());
        return redirect()->route('orders.index');
    }

    public function show(Order $order) {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order) {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order) {
        $order->update(['archived' => true]);
        return redirect()->route('orders.index');
    }

    public function restore(Order $order) {
        $order->update(['archived' => false]);
        return redirect()->route('orders.index');
    }
}
