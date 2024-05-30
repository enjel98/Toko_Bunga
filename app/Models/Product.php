<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['barcode', 'name', 'price', 'gambar_bunga', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}


