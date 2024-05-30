<?php

namespace App\Http\Controllers;

use App\Models\Detergent;
use App\Models\Fabric;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request) {
        $order = $request->validate([
            'detergent_id' => 'required',
            'fabric_id' => 'required',
            'payment_option' => 'required',
            'weight' => 'required',
            'total_amount' => 'required'
        ]);
        $order['user_id'] = auth()->user()->id;
        $order['status'] = "pending";
        Order::create($order);
        return redirect('/user/order');
    }

    public function index() {
        $orders = Order::where('user_id', auth()->user()->id)->latest()->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
     
        return view('user.order', ['orders' => $orders]);
    }

    public function update(Request $request) {
        $request->validate([
            'weight' => 'required'
        ]);
        $order = Order::find($request->order_id);
        $order->weight = $request->weight;
        $order->status = $request->status;
        $order->update();
        return back();
    }

    public function update_status(Order $order, Request $request) {
        $order->status = $request->status;
        $order->update();
        return back();
    }

    public function update_weight(Order $order, Request $request) {
        $data = $request->validate([
            'weight' => 'required'
        ]);
        $order->weight = $request->weight;
        $order->total_amount = $request->weight * 250 + 50;
        $order->update();
        return back();
    }


   
}
