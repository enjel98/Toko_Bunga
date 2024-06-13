<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flowers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .bg-pink {
        background-color: #d58f9b !important;
    }
</style>

<body style="background-image: url('/assets/images/backgroud.jpg');">
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#home-page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#home-flowers">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#home-shop">Shop</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    {{-- home --}}
    <section id="home-page" class="pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Section Home</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p>
                                Produk Pre-order adalah produk yang memiliki masa pengemasan yang lebih lama, yaitu
                                tiga hari atau lebih. Produk Pre-order umumnya adalah produk custom atau produk yang
                                membutuhkan penanganan khusus. Masa pengemasan untuk produk Pre-order adalah 3-30
                                hari kerja.
                            </p>
                            <p>
                                Situs web ini menyimpan cookies di komputer Anda. Cookies ini digunakan untuk
                                mengumpulkan informasi tentang bagaimana Anda berinteraksi dengan situs web kami dan
                                memungkinkan kami untuk mengingat Anda. Kami menggunakan informasi ini untuk
                                meningkatkan dan menyesuaikan pengalaman penjelajahan Anda dan untuk analitik dan
                                metrik tentang pengunjung kami baik di situs web ini maupun media lainnya. Untuk
                                mengetahui lebih lanjut tentang cookies yang kami gunakan, lihatKebijakan Cookie
                            </p>
                            <button class="btn btn-danger" onclick="alert('Pesanan Anda telah diterima!')">Pesan
                                sekarang
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{ asset('assets/img/galeri_customer.jpeg') }}" style="width: 50%;" alt="">
                            <div>
                                <i class="align-center text-primary">Gambar 1.1 bunga melati</i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- //flowers --}}
    <section id="home-flowers" class="pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Section Product</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/assets/img/forever_flower03.webp') }}" class="card-img-top"
                                     alt="..." style="width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">Bunga Mawar</h5>
                                    <p class="card-text text-dark font-weight-bold">Rp. 50.000</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-preorder" title="Order">Order now
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/assets/img/flower_artificial01.webp') }}" class="card-img-top"
                                     alt="..." style="width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">Bunga Mawar</h5>
                                    <p class="card-text text-dark font-weight-bold">Rp. 50.000</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-preorder" title="Order">Order now
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/assets/img/flower_artificial02.webp') }}" class="card-img-top"
                                     alt="..." style="width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">Bunga Mawar</h5>
                                    <p class="card-text text-dark font-weight-bold">Rp. 50.000</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-preorder" title="Order">Order now
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/assets/img/flower_artificial03.webp') }}" class="card-img-top"
                                     alt="..." style="width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">Bunga Mawar</h5>
                                    <p class="card-text text-dark font-weight-bold">Rp. 50.000</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-preorder" title="Order">Order now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- //flowers --}}
    <section id="home-shop" class="pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Section Shopping</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-shopping" width="100%" cellspacing="0">
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
                                    $total = $shop->qty_order * 50000
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $shop->name_customer }}</td>
                                    <td>Bunga Mawar</td>
                                    <td>{{ $shop->qty_order }}</td>
                                    <td>{{ $total }}</td>
                                    <td>{{ $shop->keterangan }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i>Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Edit"><i class="fa fa-edit"></i>Hapus
                                        </button>
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
    </section>
    @include('pages.modal')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js
