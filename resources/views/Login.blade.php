<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HALAMAN LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('./Admin/images/favicon.jpg') }}" width="30" type="image/x-icon" />
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">-->
    <link href="{{ asset('./Admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('./Admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('./Admin/js/head.js') }}"></script>
</head>

<body>
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0 px-3 py-3 vh-100">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-0 p-0 p-lg-3">
                                        <div class="mb-0 border-0 p-md-4 p-lg-0">
                                            <div class=" my-4">
                                                <span>
                                                    <h3 class="text-dark text-center fw-semibold mb-3">
                                                        SELAMAT DATANG LOGIN
                                                    </h3>
                                                    <img src="{{ asset('img/logodprdkotacilegon.png') }}" alt=""
                                                        style="width: 100%; height: 200px" style="object-fit: fill;">
                                                </span>
                                            </div>
                                            @if (session()->has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show text-center"
                                                    role="alert">
                                                    {{ session('error') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success alert-dismissible fade show text-center"
                                                    role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <div class="pt-0">
                                                <form id="FORMlogin" action="{{ url('/Validasi') }}" method="POST"
                                                    class="my-4">
                                                    @csrf
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="Email"
                                                            name="email" placeholder="" autocomplete="email" required>
                                                        <label for="Email">Email</label>
                                                    </div>

                                                    <div class="form-floating mb-3 position-relative">
                                                        <input type="password" class="form-control" id="Password"
                                                            name="password" placeholder="***"
                                                            autocomplete="current-password" required>
                                                        <label for="Password">Password</label>
                                                        <button type="button"
                                                            class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-2"
                                                            id="togglePassword" style="background: none; border: none;">
                                                            <i class="position-absolute top-50 end-0 translate-middle-y me-2"
                                                                data-feather="eye-off" id="togglePasswordIcon"></i>
                                                        </button>
                                                    </div>

                                                    {{-- <div class="mb-3">
                                                        <div class="g-recaptcha"
                                                            data-sitekey="6LfSml4rAAAAAI_aZechCUjhFc-mtJ2oYbsquEhz">
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group mb-0 row">
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <a href="/forget-password"
                                                                    class="text-decoration-none mb-2 d-block text-muted small">
                                                                    Lupa password?
                                                                </a>
                                                                <button class="btn btn-outline-primary fw-semibold"
                                                                    type="submit">MASUK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 d-none d-xl-inline-block">
                    <div class="account-page-bg rounded-4">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    <script src="{{ asset('./Admin/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('./Admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('./Admin/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('./Admin/js/login.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var passwordInput = document.getElementById("Password");
            var togglePasswordButton = document.getElementById("togglePassword");

            togglePasswordButton.addEventListener("click", function() {
                var togglePasswordIcon = document.getElementById("togglePasswordIcon");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    togglePasswordIcon.setAttribute("data-feather", "eye");
                } else {
                    togglePasswordIcon.setAttribute("data-feather", "eye-off");
                    passwordInput.type = "password";
                }

                feather.replace();
            });
        });
    </script>

    <script>
        document.addEventListener('copy', function(e) {
            const selection = window.getSelection().toString();
            const url = window.location.href;
            const copyText = selection + '\n\nBaca selengkapnya di: ' + url;

            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12') {
                e.preventDefault();
            }

            if (e.ctrlKey && e.shiftKey && ['I', 'C', 'J'].includes(e.key)) {
                e.preventDefault();
            }

            if (e.ctrlKey && e.key === 'u') {
                e.preventDefault();
            }
        });

        document.addEventListener('contextmenu', function(e) {
            if (e.target.tagName === 'IMG') {
                e.preventDefault();

                const menu = document.getElementById('customMenu');
                const link = document.getElementById('downloadImage');

                menu.style.left = e.pageX + 'px';
                menu.style.top = e.pageY + 'px';
                menu.style.display = 'block';

                link.href = e.target.src;
            } else {
                e.preventDefault();
                document.getElementById('customMenu').style.display = 'none';
            }
        });

        document.addEventListener('click', function() {
            document.getElementById('customMenu').style.display = 'none';
        });
    </script>
</body>

</html>
