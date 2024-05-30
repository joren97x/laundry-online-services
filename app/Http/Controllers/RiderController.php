<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Rider;
use App\Models\Fabric;
use App\Models\Detergent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiderController extends Controller
{
    public function dashboard(){
        $completed_orders = Order::where('status', 'complete')->count();
        $new_orders = Order::where('status', 'pending')->orWhere('status', 'pick up')->count();
        $in_progress = Order::where('status', 'delivery')->count();

        return view('rider.dashboard', 
        [
            'completed_orders' => $completed_orders,
            'new_orders' => $new_orders,
            'in_progress' => $in_progress
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        Rider::create($data);
        return back();
    }

    // public function bookings(?string $category = null) {
    //     if($category) {
    //         $orders = Order::where('status', $category)->get();
    //     }
    //     else {
    //         $orders = Order::all();
    //     }

    //     foreach($orders as $order) {
    //         $order->user = User::find($order->user_id);
    //         $order->fabric = Fabric::find($order->fabric_id);
    //         $order->detergent = Detergent::find($order->detergent_id);
    //     }
    //     return view('rider.bookings.pending', ['orders' => $orders]);
    // }

    public function pending() {
        $orders = Order::where('status', 'pending')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.bookings.pending', ['orders' => $orders]);

    }
   
    public function pick_up() {
        $orders = Order::where('status', 'pick up')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.bookings.pick-up', ['orders' => $orders]);
    }

    public function process() {
        $orders = Order::where('status', 'process')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.bookings.process', ['orders' => $orders]);
    }

    public function delivery() {
        $orders = Order::where('status', 'delivery')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.bookings.delivery', ['orders' => $orders]);
    }

    public function login() {
        return view ('rider.login');
    }

    public function history() {
        $orders = Order::where('status', 'complete')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.transaction-history', ['orders' => $orders]);
    }


    public function logoutRider(Request $request) 
    {
        Auth::guard('rider')->logout();
        return redirect()->route('rider.login');

    }
}