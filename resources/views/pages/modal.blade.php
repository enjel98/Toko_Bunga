@foreach ($products as $bunga)
<div class="modal fade" id="modal-preorder-{{ $bunga->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Preorder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('home-page.simpanPreorder', $bunga->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $bunga->id }}">
                    <input type="hidden" name="price" class="price-bunga" value="{{ $bunga->price }}">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Bunga</label>
                                <input type="text" class="form-control" value="{{ $bunga->name }}"
                                    placeholder="Silahkan masukkan nama" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Customer</label>
                                <input type="text" name="name_customer" class="form-control"
                                    placeholder="Silahkan masukkan nama">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Jumlah Preorder</label>
                                <input type="text" name="qty_order" class="form-control qty-preorder" oninput="hitungTotal()"
                                    placeholder="Silahkan jumlah preorder">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" cols="30" rows="2" class="form-control"
                                    placeholder="Silahkan masukkan keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Total Preorder</label>
                                <input type="text" class="form-control total-preorder" placeholder="Total"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach