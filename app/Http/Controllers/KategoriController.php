<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Ensure the model name matches your class definition
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Tambah Kategori']);
        } catch (\Exception $e) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Tambah Kategori']);
        }
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

        $kategori = Kategori::findOrFail($request->id_kategori); // Use the correct model name
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Ubah Kategori']);
        } catch (\Exception $e) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Ubah Kategori']);
        }
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Hapus Kategori']);
        } catch (\Exception $e) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Hapus Kategori']);
        }
    }
}
