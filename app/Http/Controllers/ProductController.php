<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required|integer',
            'stok' => 'required|integer'
        ]);

        $product = Product::find($request->id);
        if ($product === null) {
            abort(404);
        }

        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stok = $request->stok;


        if ($request->hasFile('gambar_bunga')) {
            $request->file('gambar_bunga')->store('public');
            $gambar_bunga = $request->file('gambar_bunga')->hashName();
            $product->gambar_bunga = $gambar_bunga;
        }

        $product->save();
        return redirect(url('/products'));
    }


    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }

        return view('content.product.edit', [
            'product' => $product
        ]);
    }

    public function delete(Request $request)
    {
        $idProduct = $request->id;
        $product = Product::find($idProduct);
        if ($product === null) {
            return response()->json([], 404);
        }
        $product->delete();
        return response()->json([], 200);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'id_kategori' => 'required',
            'gambar_bunga' => 'required',
            'stok' => 'required|integer'
        ]);

        $request->file('gambar_bunga')->store('public');
        $gambar_bunga = $request->file('gambar_bunga')->hashName();

        $product = new Product();
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_kategori = $request->id_kategori;
        $product->gambar_bunga = $gambar_bunga;
        $product->stok = $request->stok;
        $product->save();
        return redirect(url('/products'));


    }

    public function list()
    {
        $products = Product::query()->paginate(5);
        return view('content.product.list', [
            'products' => $products
        ]);
    }

    public function add()
    {
        $kategori = Kategori::all();
        return view('content.product.add', compact('kategori'));
    }
}

