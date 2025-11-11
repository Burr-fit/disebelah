<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('assets/images/vegetables-3/favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/vegetables-3/favicon.png') }}" type="image/x-icon" />
    <title>Cafe Disebelah</title>

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify-icons.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <style>
        .cart_qty_cls.bump {
            transform: scale(1.3);
        }
    </style>


</head>

<body class="theme-color-11">


    @include('Customer.Layout.Sidebar')
    @include('Customer.Layout.Navbar')

    <div class="space_sm section-t-space">
        @include('Customer.Layout.Slider')
        <div class="container-fluid p-0-xl">
            @yield('content')
        </div>
        @include('Customer.Layout.Footer')
    </div>

    @include('Customer.Layout.Cart')



    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- portfolio js -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- menu js-->
    <script src="{{ asset('assets/js/menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

    <!-- slick js-->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slick-animation.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom-slick-animated.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartQtyEl = document.querySelector(".cart_qty_cls");
            const addToCartButtons = document.querySelectorAll(".cart-info button[title='Add to cart']");
            const cartCanvas = document.querySelector("#cartOffcanvas");

            // Ambil qty awal dari localStorage (biar gak reset tiap reload)
            let cartQty = parseInt(localStorage.getItem("cartQty")) || 0;
            cartQtyEl.textContent = cartQty > 0 ? cartQty : 0;

            addToCartButtons.forEach(btn => {
                btn.addEventListener("click", function() {
                    // Tambah qty
                    cartQty++;
                    cartQtyEl.textContent = cartQty;

                    // Simpan ke localStorage
                    localStorage.setItem("cartQty", cartQty);
                    // Animasi kecil biar keliatan interaktif
                    cartQtyEl.classList.add("bump");
                    setTimeout(() => cartQtyEl.classList.remove("bump"), 300);
                });
            });
        });
    </script>


</body>

</html>
