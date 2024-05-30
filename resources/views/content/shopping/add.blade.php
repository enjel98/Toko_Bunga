@extends('layout.main')
@section('judul','Tambah Shopping Bunga')

@section('content')
    <form method="post" action="{{route('shopping.insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product</label>
                            <select name="id_product" id="id_product" class="form-control">
                                <option value="" selected>Pilih Product</option>
                                @foreach($product as $produk)
                                    <option value="{{$produk->id}}">{{$produk->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Customer</label>
                            <input type="text" id="name_customer" name="name_customer" class="form-control" placeholder="Silahkan masukan nama">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Shopping</label>
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Silahkan masukan jumlah">
                        </div>
                        <div class="form-group">
                            <label for="">Description Shopping</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Silahkan masukan description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ route('shopping.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
