
@extends('layout.main')
@section('judul','Data Shopping Bunga')

@section('content')
    @if (session()->has('pesan'))
        <div class="alert alert-{{ session()->get('pesan')[0] }}">
            {{ session()->get('pesan')[1] }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{route('shopping.add')}}">Tambah Data Shopping</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Product</th>
                                <th>Barcode</th>
                                <th>Name Customer</th>
                                <th>Jumlah</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shopping as $key => $item)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $item->nama_product }}</td>
                                    <td>{{ $item->barcode }}</td>
                                    <td>{{ $item->name_customer }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->description }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
    </script>
@endpush
