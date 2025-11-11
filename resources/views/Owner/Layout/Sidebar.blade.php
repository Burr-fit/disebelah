<div id="sidebar-menu">

    <div class="logo-box">
        <a class='logo logo-light' href='#'>
            <span class="logo-sm">
                <img src="{{ asset('Front/images/logodprdkotacilegon.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('Front/images/logodprdkotacilegon.png') }}" alt="" height="50">
            </span>
        </a>
        <a class='logo logo-dark' href='#'>
            <span class="logo-sm">
                <img src="{{ asset('Front/images/logodprdkotacilegon.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('Front/images/logodprdkotacilegon.png') }}" alt="" height="50">
            </span>
        </a>
    </div>

    <ul id="side-menu" class="mt-3">
        <li>
            <a href="{{ url('/Owner/Dashboard') }}" class="tp-link">
                <i data-feather="layout"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="{{ url('/Owner/Dashboard') }}" class="tp-link">
                <i data-feather="layout"></i>
                <span> Tempat </span>
            </a>
        </li>

        <li>
            <a href="#bahanbaku" data-bs-toggle="collapse">
                <i data-feather="layout"></i>
                <span> Stok Bahan </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="bahanbaku">
                <ul class="nav-second-level">
                    <li><a class="tp-link" href="{{ url('/Owner/Anggota-DPRD') }}"> Satuan </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Pendidikan') }}"> Daftar Bahan </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Jabatan') }}"> Pembelian Bahan </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Organisasi') }}"> Pemakaian Bahan </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Aspirasi') }}"> Mutasi Bahan</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#produk" data-bs-toggle="collapse">
                <i data-feather="layout"></i>
                <span> Produk & Resep</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="produk">
                <ul class="nav-second-level">
                    <li><a class="tp-link" href="{{ url('/Owner/Anggota-DPRD') }}"> Katagori Produk </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Pendidikan') }}"> Daftar Produk </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Jabatan') }}"> Resep Produk </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Organisasi') }}"> Promo Produk </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Aspirasi') }}"> Bundle Produk</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#Customer" data-bs-toggle="collapse">
                <i data-feather="layout"></i>
                <span> Customer </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="Customer">
                <ul class="nav-second-level">

                    <li><a class="tp-link" href="{{ url('/Owner/Anggota-DPRD') }}"> Daftar Customer </a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#pemesanan" data-bs-toggle="collapse">
                <i data-feather="layout"></i>
                <span> Kasir </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="pemesanan">
                <ul class="nav-second-level">
                    <li><a class="tp-link" href="{{ url('/Owner/Anggota-DPRD') }}"> Transaksi Penjualan </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Pendidikan') }}"> Riwayat Transaksi </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Jabatan') }}"> Pembayaran </a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#laporanhpp" data-bs-toggle="collapse">
                <i data-feather="layout"></i>
                <span> Laporan HPP </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="laporanhpp">
                <ul class="nav-second-level">
                    <li><a class="tp-link" href="{{ url('/Owner/Anggota-DPRD') }}"> HPP per-Menu </a></li>
                    <li><a class="tp-link" href="{{ url('/Owner/Riwayat-Pendidikan') }}"> HPP per-Transaksi </a></li>
                </ul>
            </div>
        </li>

    </ul>
</div>

<div class="clearfix"></div>
