@extends('layout.main')
@section('judul','Tambah Product Bunga')

@section('content')
    <form method="post" action="{{ url('products/insert') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">

                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar_bunga" class="form-control @error('gambar_bunga') is-invalid @enderror"
                                   accept="image/*" onchange="previewImage(event)">
                            @error('gambar_bunga')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                            <p></p>
                            <img id="preview" onerror="this.onerror=null;this.src='http://127.0.0.1:8000/images/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg';" alt="" width="15%">
                        </div>

                        <div class="form-group">
                            <label for="">Barcode</label>
                            <input type="text"
                                   class="form-control @error('barcode') is-invalid @enderror"
                                   value="{{old('barcode')}}"
                                   name="barcode">
                            @error('barcode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{old('name')}}"
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{old('price')}}"
                                   name="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number"
                                   class="form-control @error('stok') is-invalid @enderror"
                                   value="{{old('stok')}}"
                                   name="stok">
                            @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori Bunga</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                @foreach ($kategori as $row)
                                    <option value="{{$row->id_kategori}}">{{$row->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ url('/products') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
