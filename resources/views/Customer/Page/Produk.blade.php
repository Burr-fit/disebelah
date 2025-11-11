@extends('Customer.Layout.Index')
@section('content')
    <!-- Tab product -->
    <section class="addtocart_count ratio_square bg-title wo-bg">
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
                            <li class="current"><a href="tab-4.html">Fruits</a></li>
                            <li><a href="tab-5.html">Vegetables</a></li>
                        </ul>

                        <div class="tab-content-cls">
                            <div id="tab-4" class="tab-content active default">
                                <div class="g-3 g-md-4 row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <div class="ribbon"><span>Exclusive</span></div>
                                                    <a href="#!">
                                                        <img src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/1.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="rating-label"><i class="ri-star-fill"></i><span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist" class="wishlist-icon"><i
                                                                class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Deliciously Sweet Strawberry
                                                            </a>

                                                        </div>
                                                        <h4 class="price">$ 8.90<del> $10.00 </del><span
                                                                class="discounted-price"> 8% Off
                                                            </span>
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/2.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist" class="wishlist-icon"><i
                                                                class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Nature's Sweet Banana </a>

                                                        </div>
                                                        <h4 class="price">$ 2.10<del> $3.00 </del><span
                                                                class="discounted-price"> 7% Off
                                                            </span>
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/3.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Superior Quality Amla </a>
                                                        </div>
                                                        <h4 class="price">$ 2.79<del> $3.00 </del><span
                                                                class="discounted-price"> 7% Off
                                                            </span>
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <div class="ribbon"><span>Sale</span></div>
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/4.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Palm Bliss Unleashed </a>
                                                        </div>
                                                        <h4 class="price">$ 3.20 </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/5.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Juicy Green Kiwi </a>

                                                        </div>
                                                        <h4 class="price">$ 5.40 </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-5" class="tab-content">
                                <div class="g-3 g-md-4 row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <div class="ribbon"><span>Exclusive</span></div>
                                                    <a href="#!">
                                                        <img src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/7.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="rating-label"><i class="ri-star-fill"></i><span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Handpicked Tomatoes
                                                            </a>

                                                        </div>
                                                        <h4 class="price">$ 10.50 </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/8.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Premium Organic OnionHandpicked Tomatoes
                                                            </a>

                                                        </div>
                                                        <h4 class="price">$ 8.60 </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/9.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Gourmet Organic Cabbage
                                                            </a>

                                                        </div>
                                                        <h4 class="price">$ 4.29
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <div class="ribbon"><span>Sale</span></div>
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/10.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Fresh Beetroot </a>

                                                        </div>
                                                        <h4 class="price">$ 6.58
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="basic-product theme-product-1">
                                            <div class="overflow-hidden">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img
                                                            src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/product/11.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                    <div class="rating-label"><i class="fa fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                    <div class="cart-info">
                                                        <a href="#!" title="Add to Wishlist"
                                                            class="wishlist-icon"><i class="ri-heart-line"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i
                                                                class="ri-shopping-cart-line"></i></button> <a
                                                            href="#!" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" title="Quick View"><i
                                                                class="ri-eye-line"></i></a> <a href="compare.html"
                                                            title="Compare"><i class="ri-loop-left-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="brand-w-color">
                                                            <a class="product-title product-title1"
                                                                href="product-page(accordian).html">
                                                                Fresh Organic Garlic </a>

                                                        </div>
                                                        <h4 class="price">$ 12.90
                                                        </h4>
                                                    </div>
                                                    <ul class="offer-panel">
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                        <li><span class="offer-icon"><i
                                                                    class="ri-discount-percent-fill"></i></span>
                                                            Limited Time Offer: 5% off</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab product end -->
@endsection
