<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets/dist/img/bunga.jpg"   alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; width: 50px; !important; ">
        <span class="brand-text font-weight-light">TOKO BUNGA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @can('admin')
                @endcan

                <li class="nav-item">
                    <a href="{{ url('/kategori')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Data Kategori
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/products')}}" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Data Product
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('shopping.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Shopping
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Aplikasi Kasir
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('/transaksi')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
