<!-- top header start -->
<header class="header-5 left-sidebar-header">
    <div class="mobile-fix-option"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="navbar d-block d-xl-none">
                            <a href="javascript:void(0)" id="toggle_sidebar-res">
                                <div class="bar-style"><i class="ri-bar-chart-horizontal-line sidebar-bar"></i>
                                </div>
                            </a>
                        </div>
                        <div class="brand-logo">
                            <a href="index.html">
                                <img src="https://themes.pixelstrap.com/multikart/assets/images/vegetables-3/logo.png"
                                    class="img-fluid blur-up lazyload" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search bg-white rounded-0" role="form">
                            <input type="search" placeholder="Search any Vegetable or Grocery..."
                                class="nav-search nav-search-field">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <div class="top-header">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist">
                                    <a href="#!">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li class="onhover-dropdown mobile-account" id="accountMenu">
                                    <i class="ri-user-line"></i>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <a href="{{ url('/') }}">
                                            <i class="ri-home-line"></i>
                                        </a>
                                    </li>

                                    <li class="onhover-div mobile-cart">
                                        <div data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                                            <i class="ri-shopping-cart-line"></i>
                                        </div>
                                        <span class="cart_qty_cls">0</span>
                                    </li>

                                    <li class="onhover-div mobile-setting">
                                        <div>
                                            <i class="ri-settings-2-line"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- top header end -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const accountMenu = document.getElementById("accountMenu");

        // Ambil status login dari localStorage
        const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
        const userPicture = localStorage.getItem("userPicture");
        const userName = localStorage.getItem("userName");

        if (isLoggedIn && userPicture) {
            accountMenu.innerHTML = `
                <img src="${userPicture}" alt="${userName}" 
                     class="rounded-circle border border-2" 
                     width="35" height="35" 
                     style="object-fit:cover;">
            `;
        } else {
            accountMenu.innerHTML = `<i class="ri-user-line"></i>`;
        }
    });
</script>
