<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $Page }}</title>
    <link rel="shortcut icon" href="{{ asset('./Admin/images/favicon.jpg') }}" width="50" type="image/x-icon" />
    <link href="{{ asset('./Admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('./Admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/css/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/css/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/libs/select2/select2.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('./Admin/js/head.js') }}"></script>
    <link href="{{ asset('./Admin/css/styleBravo.css') }}" rel="stylesheet" type="text/css" />

    {{-- ICON --}}
    <link href="{{ asset('./Admin/fontawesome-6.7.2/css/fontawesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/fontawesome-6.7.2/css/brands.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('./Admin/fontawesome-6.7.2/css/solid.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- ICON --}}

</head>

<body data-menu-color="light" data-sidebar="default">
    <div id="app-layout">
        <div class="topbar-custom">
            <div class="container-fluid">
                @include('Owner.Layout.Navbar')
            </div>
        </div>
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>
                @include('Owner.Layout.Sidebar')
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy;
                                {{ date('Y') }} - Made with by
                                <a href="#!" class="text-reset fw-semibold">BRAVO SOLUTION INDONESIA</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('./Admin/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('./Admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.0/dist/bootstrap-table.min.js"></script>

    <script src="{{ asset('./Admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('./Admin/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('./Admin/js/app.js') }}"></script>
    <script src="{{ asset('./Admin/js/proses.js') }}"></script>
    <script src="{{ asset('./Admin/js/prosesdprd.js') }}"></script>
    <script src="{{ asset('./Admin/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('./Admin/js/sweetalert2@11.js') }}"></script>

    <script src="{{ asset('./Admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./Admin/js/pages/datatable.init.js') }}"></script>


    {{-- ICON --}}
    <script src="{{ asset('./Admin/fontawesome-6.7.2/js/fontawesome.js') }}"></script>
    <script src="{{ asset('./Admin/fontawesome-6.7.2/js/brands.js') }}"></script>
    <script src="{{ asset('./Admin/fontawesome-6.7.2/js/solid.js') }}"></script>
    {{-- ICON --}}

</body>

</html>
