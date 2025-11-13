@extends('Customer.Layout.Index')
@section('content')
    @include('Customer.Layout.Banner')

    <!-- Tab product -->
    <section class="addtocart_count ratio_square bg-title wo-bg mb-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title1">
                        <h4>exclusive products</h4>
                        <h2 class="title-inner1">special products</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="theme-tab">
                        <ul class="tabs tab-title">
                            @foreach ($katagori_produks as $value)
                                <li class="{{ $loop->first ? 'current' : '' }}">
                                    <a href="tab-{{ $value->idKatagori }}">{{ $value->namaKatagori }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content-cls">
                            @foreach ($katagori_produks as $value)
                                <div id="tab-{{ $value->idKatagori }}"
                                    class="tab-content {{ $loop->first ? 'active default' : '' }}">
                                    <div class="g-3 g-md-4 row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                        @forelse ($value->produks as $produk)
                                            <div>
                                                <div class="basic-product theme-product-1">
                                                    <div class="overflow-hidden">
                                                        <div class="img-wrapper">
                                                            <a href="#!">
                                                                <img src="{{ asset($produk->gambar) }}"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <div class="rating-label">
                                                                <i class="ri-star-fill"></i>
                                                                <span>4.5</span>
                                                            </div>
                                                            <div class="cart-info">
                                                                <a href="#!" title="Add to Wishlist"
                                                                    class="wishlist-icon">
                                                                    <i class="ri-heart-line"></i>
                                                                </a>
                                                                <button class="add-to-cart-btn"
                                                                    data-id="{{ $produk->idProduk }}"
                                                                    data-nama="{{ $produk->nama }}"
                                                                    data-harga="{{ $produk->harga }}"
                                                                    data-gambar="{{ asset($produk->gambar) }}">
                                                                    <i class="ri-shopping-cart-line"></i>
                                                                </button>
                                                                <a href="#!" data-bs-toggle="modal"
                                                                    data-bs-target="#quickView" title="Quick View">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                                <a href="compare.html" title="Compare">
                                                                    <i class="ri-loop-left-line"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <div class="brand-w-color">
                                                                    <a class="product-title product-title1" href="#">
                                                                        {{ $produk->nama }}
                                                                    </a>
                                                                </div>
                                                                <h4 class="price">
                                                                    {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center w-full">Belum ada produk di kategori ini.</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab product end -->
@endsection
