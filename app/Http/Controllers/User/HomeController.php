<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fabric;
use App\Models\Detergent;

class HomeController extends Controller
{
  
    public function home() {
        return view ('user.home');
    }

    public function book() {
        $fabric = Fabric::all();
        $detergent = Detergent::all();
        return view ('user.book' ,compact('fabric', 'detergent'));
    }

    public function orders() {
        return view('user.order');
    }

    public function about() {
        return view ('user.about');
    }

    
}
