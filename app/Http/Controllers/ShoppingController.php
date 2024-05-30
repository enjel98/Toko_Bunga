<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingController extends Controller
{
    public function list()
    {
        $shopping = DB::table('shoppings')
            ->select('shoppings.*', 'products.name as nama_product', 'products.barcode', 'products.stok')
            ->join('products', 'shoppings.id_product', '=', 'products.id')
            ->get();

        return view('content.shopping.list', ['shopping' => $shopping]);
    }

    public function add()
    {
        $product = Product::all();
        return view('content.shopping.add', compact('product'));
    }

    public function insert(Request $request)
    {
        $shopping = Shopping::create($request->all());

        $idProduct = $shopping->id_product;
        $jumlahPesanan = $shopping->qty;
        $product = Product::find($idProduct);
        $product->stok -= $jumlahPesanan;
        $product->save();

        return redirect(url('/shopping'))->with('Berhasil Tambah keranjang');

    }
}
