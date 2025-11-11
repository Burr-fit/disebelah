<div class="d-flex justify-content-between">
    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
        <li>
            <button class="button-toggle-menu nav-link">
                <i data-feather="menu" class="noti-icon"></i>
            </button>
        </li>
    </ul>

    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
        <!-- Button Trigger Customizer Offcanvas -->
        <li class="d-none d-sm-flex">
            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
            </button>
        </li>

        <!-- Light/Dark Mode Button Themes -->
        <li class="d-none d-sm-flex">
            <button type="button" class="btn nav-link" id="light-dark-mode">
                <i data-feather="moon" class="align-middle dark-mode"></i>
                <i data-feather="sun" class="align-middle light-mode"></i>
            </button>
        </li>

        <!-- User Dropdown -->
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                {{-- @php
                    $user = \App\Models\Akuns::find(session('idAkun'));
                    $fotoPath = public_path($user->gambar);
                    $fotoSrc =
                        !empty($user->gambar) && file_exists($fotoPath)
                            ? asset($user->gambar)
                            : asset('Admin/images/No_Image.png');
                @endphp --}}

                <img src="{{ asset('Admin/images/No_Image.png') }}" alt="user-image" class="rounded-circle" />
                <span class="pro-user-name ms-1">
                    {{ 'Owner' }}
                    <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                    <h6 class="text-overflow m-0"></h6>
                </div>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a class='dropdown-item notify-item btn btn-outline-danger' href='{{ url('logout') }}'>
                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
</div>
