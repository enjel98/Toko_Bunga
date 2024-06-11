<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Ensure the model name matches your class definition
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); // Use the correct model name
        return view('content.kategori.list', compact('kategori'));
    }

    public function tambah()
    {
        return view('content.kategori.add');
    }
    public function prosesTambah(Request $request)
    {
        // Validate the request data
        $request->validate([
        'nama_kategori' => 'required'
        ]);

        DB::beginTransaction();
        try {
            // Create a new instance of Kategori
            $kategori = new Kategori();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();

       DB::commit();
       Session::flash('message', ['Berhasil tambah kategori', 'success']);
       } catch (\Exception $e) {
       DB::rollback();
       Session::flash('message', ['Gagal tambah kategori', 'error']);
       }
       return redirect()->route('kategori.index');

    }
    public function ubah($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('content.kategori.edit', compact('kategori'));
    }

    public function prosesUbah(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);
        DB::beginTransaction();
        try {

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        DB::commit();
        Session::flash('message', ['Berhasil ubah data kategori', 'success']);
        } catch (\Exception $e) {
        DB::rollback();
        Session::flash('message', ['Gagal ubah data kategori', 'error']);
        }
        return redirect()->route('kategori.index');

    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('pesan', ['Success', 'Berhasil Hapus Kategori']);

        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('pesan', ['Danger', 'Gagal Hapus Kategori']);

        }
    }
}
