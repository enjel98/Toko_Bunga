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
                                <a href="{{ route('kategori.ubah', $row->id_kategori) }}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Ubah</a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $row->id_kategori}}" data-name="{{ $row->nama_kategori }}"><i class="fa fa-trash"></i> Hapus
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
    $(function() {
        $('.btn-hapus').on('click', function() {
            let idKategori = $(this).data('id');
            Swal.fire({
                title: "Yakin akan menghapus data?"
                , text: "Data yang dihapus tidak dapat dikembalikan"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('kategori/hapus') }}/${idKategori}`
                        , type: 'get'
                        , data: {
                            '_token': '{{ csrf_token() }}'
                        }
                        , success: function(response) {
                            Toast.fire({
                                icon: "success"
                                , title: "Berhasil hapus data kategoris"
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 500);

                        }
                        , error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    });

</script>
@endpush
