<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index()
    {
        $shoppings = Order::orderBy('id', 'desc')->get();
        return view('pages.home', compact('shoppings'));
    }

    public function simpanPreorder(Request $request){
        DB::beginTransaction();
        try {

            $data = new Order();
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
