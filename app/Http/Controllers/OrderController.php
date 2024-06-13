<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $shoppings = DB::table('orders')
        ->join('products', 'orders.id_products', '=', 'products.id')
        ->select('orders.*','products.name as product_name', 'products.price as product_price')
        ->orderBy('orders.id', 'desc')
        ->get();;
        return view('content.order.index', compact('shoppings'));
    }
}
