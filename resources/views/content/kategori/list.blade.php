@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Kategori</h1>
            </div>
            <div class="col-lg-12 text-right">
                <a href="{{ route('kategori.tambah') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                    Tambah</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-{{ session()->get('pesan')[0] }}">
                {{ session()->get('pesan')[1] }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kategori as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('kategori.ubah', $row->id_kategori) }}"
                                       class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Ubah</a>
                                    <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $row->id_kategori}}"
                                            data-name="{{ $row->nama_kategori }}"><i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idKategori = $(this).data('id');
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
                            url: '{{ route('kategori.hapus', '') }}/' + idKategori,
                            type: 'GET', // Use GET since your route is GET
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
