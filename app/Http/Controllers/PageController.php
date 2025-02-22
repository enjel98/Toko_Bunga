<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index()
    {
        $shoppings = DB::table('orders')
        ->join('products', 'orders.id_products', '=', 'products.id')
        ->select('orders.*','products.name as product_name', 'products.price as product_price')
        ->orderBy('orders.id', 'desc')
        ->get();
       
        $products = Product::orderBy('id', 'desc')->get();

        return view('pages.home', compact('shoppings', 'products'));
    }

    public function simpanPreorder(Request $request){
        DB::beginTransaction();
        try {

            $products = Product::where('id', $request->id)->first();
            $data = new Order();
            $data->id_products = $products->id;
            $data->name_customer = $request->name_customer;
            $data->qty_order = $request->qty_order;
            $data->tanggal_order = now();
            $data->keterangan = $request->keterangan;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil tambah order', 'success']);
       } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal tambah order', 'error']);
       }
            return redirect()->route('home-page.index');
    }
}
