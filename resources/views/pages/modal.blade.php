<div class="modal fade" id="modal-preorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Preorder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('home-page.simpanPreorder') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Customer</label>
                                <input type="text" name="name_customer" class="form-control"
                                    placeholder="Silahkan masukan nama">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Jumlah Preorder</label>
                                <input type="text" id="qty-preorder" name="qty_order" class="form-control"
                                    placeholder="Silahkan jumlah preorder">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="2" class="form-control"
                                    placeholder="Silahkan masukan keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Total Preorder</label>
                                <input type="text" id="total-preorder" class="form-control" placeholder="total"
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
