<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Fabric;
use App\Models\Detergent;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() 
    {

        $completed_orders = Order::where('status', 'complete')->count();
        $new_orders = Order::where('status', 'pending')->orWhere('status', 'pick up')->count();
        $in_progress = Order::where('status', 'delivery')->count();

        return view('admin.dashboard', 
        [
            'completed_orders' => $completed_orders,
            'new_orders' => $new_orders,
            'in_progress' => $in_progress
        ]);
    }
    public function order()
    {
        // $orders = Order::where('user_id', auth()->user()->id)->latest()->get();
        $pendingOrders = Order::where('status', 'pending')->get();
        $this->getData($pendingOrders);
        $processOrders = Order::where('status', 'process')->get();
        $this->getData($processOrders);
        $pickUpOrders = Order::where('status', 'pick up')->get();
        $this->getData($pickUpOrders);
        $deliveryOrders = Order::where('status', 'delivery')->get();
        $this->getData($deliveryOrders);
        return view('admin.order', 
            [
                'pickUpOrders' => $pickUpOrders,
                'pendingOrders' => $pendingOrders,
                'deliveryOrders' => $deliveryOrders,
                'processOrders' => $processOrders,
            ]);
    }

    function getData($orders) {
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
    }
    
    public function detergent() 
    {
        return view('admin.detergent');
    }
    public function order_status()
    {
        return view('admin.order_status');
    }

    public function history() {
        $orders = Order::where('status', 'complete')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('admin.transaction-history', ['orders' =>  $orders]);
    }

}
