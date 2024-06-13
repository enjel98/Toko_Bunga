@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Order</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-orders" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customers</th>
                                <th>Nama bunga</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Description</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shoppings as $key => $shop)
                                @php
                                    $total = $shop->qty_order * $shop->product_price;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $shop->name_customer }}</td>
                                    <td>{{ $shop->product_name }}</td>
                                    <td>{{ $shop->qty_order }}</td>
                                    <td>{{ $total }}</td>
                                    <td>{{ $shop->keterangan }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" title="hapus"><i
                                                class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-success" title="terima"><i
                                                class="fa fa-check"></i></button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
