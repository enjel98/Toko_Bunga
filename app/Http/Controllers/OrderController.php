<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $shoppings = Order::orderBy('id', 'desc')->get();
        return view('content.order.index', compact('shoppings'));
    }
}
