@extends('layout.main')
@section('judul','Data Product Bunga')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('order/list') }}">Tambah Data Product</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <th>No</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th>Pre Order Date</th>
                            <th>Delivery Date</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @php
                                $i = ($orders->currentPage() - 1) * $orders->perPage() + 1;
                            @endphp
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->pre_order_date }}</td>
                                    <td>{{ $order->delivery_date }}</td>
                                        <a class="btn btn-warning btn-sm" href="{{ url('$orders/edit/' . $order->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" data-id-product="{{ $order->id }}" data-name="{{ $order->name }}" class="btn btn-danger btn-sm btn-hapus">
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
        $(function() {
            $('.btn-hapus').on('click', function() {
                let idProduct = $(this).data('id-product');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi"
                    , text: `Anda yakin hapus data ${name}?`
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#3085d6"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Ya, Hapus!"
                    , cancelButtonText: "Batal"
                    , }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/products/delete'
                            , type: 'POST'
                            , data: {
                                _token: '{{ csrf_token() }}'
                                , id: idProduct
                            }
                            , success: function() {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function() {
                                        window.location.reload();
                                    })
                            }
                            , error: function() {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika hapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
