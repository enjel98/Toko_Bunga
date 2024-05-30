@extends('layout.main')
@section('judul', 'Edit Product Bunga')

@section('content')
    <form method="post" action="{{ url('products/update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar_bunga" class="form-control @error('gambar_bunga') is-invalid @enderror"
                                   accept="image/*" onchange="previewImage(event)">
                            @error('gambar_bunga')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <p></p>
                            <img id="preview" src="{{ asset('storage/' . $product->gambar_bunga) }}"
                                 onerror="this.onerror=null;this.src='http://127.0.0.1:8000/images/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg';"
                                 alt="Product Image" width="15%">
                        </div>
                        <div class="form-group">
                            <label for="barcode">Barcode</label>
                            <input type="text"
                                   class="form-control @error('barcode') is-invalid @enderror"
                                   value="{{ $product->barcode }}"
                                   name="barcode">
                            @error('barcode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ $product->name }}"
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ $product->price }}"
                                   name="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number"
                                   class="form-control @error('stok') is-invalid @enderror"
                                   value="{{ $product->stok }}"
                                   name="stok">
                            @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
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
