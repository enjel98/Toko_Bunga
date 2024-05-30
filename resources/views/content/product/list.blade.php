@extends('layout.main')
@section('judul','Data Product Bunga')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('products/add') }}">Tambah Data Product</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = ($products->currentPage() - 1) * $products->perPage() + 1;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if($product->gambar_bunga)
                                            <img src="{{ asset('storage/' . $product->gambar_bunga) }}" width="50px" height="50px">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $product->barcode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if($product->kategori)
                                            {{ $product->kategori->nama_kategori }}
                                        @else
                                            Kategori Tidak Tersedia
                                        @endif
                                    </td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ url('products/edit/' . $product->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" data-id-product="{{ $product->id }}" data-name="{{ $product->name }}" class="btn btn-danger btn-sm btn-hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idProduct = $(this).data('id-product');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/products/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idProduct
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    })
                            },
                            error: function () {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika hapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
