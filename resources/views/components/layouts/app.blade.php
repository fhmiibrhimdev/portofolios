<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="icon" type="image/png" href="{{ asset('icons/MIDRAGON.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/stisla/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css" />
    <link rel="stylesheet" href="{{ asset('assets/midragon/css/custom.css') }}">

    @stack('general-css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/stisla/css/components.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="layout-3" style="font-family: 'Inter', sans-serif">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg "></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="{{ url('dashboard') }}" class="navbar-brand sidebar-gone-hide">MIDRAGON</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <form class="form-inline ml-auto">
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="/profile" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item text-danger has-icon"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="far fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav" style="margin-top: 0px">
                        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard" class="nav-link">
                                <i class="far fa-home"></i><span>Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->hasRole('admin'))
                            <li
                                class="nav-item dropdown {{ request()->is('module/artikel/kategori') || request()->is('module/artikel/sub-kategori') || request()->is('module/artikel/postingan') ? 'active' : '' }}">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                    <i class="far fa-blog"></i><span>Artikel</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li
                                        class="nav-item {{ request()->is('module/artikel/kategori') ? 'active' : '' }}">
                                        <a href="/module/artikel/kategori" class="nav-link">Kategori</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/artikel/sub-kategori') ? 'active' : '' }}">
                                        <a href="/module/artikel/sub-kategori" class="nav-link">Sub-Kategori</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/artikel/postingan') ? 'active' : '' }}">
                                        <a href="/module/artikel/postingan" class="nav-link">Postingan</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item dropdown {{ request()->is('module/project/project') ? 'active' : '' }}">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                    <i class="far fa-project-diagram"></i><span>Project</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item {{ request()->is('module/project/project') ? 'active' : '' }}">
                                        <a href="/module/project/project" class="nav-link">Buat Project</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item dropdown {{ request()->is('module/keagamaan/kategori') || request()->is('module/keagamaan/sub-kategori') || request()->is('module/keagamaan/postingan') ? 'active' : '' }}">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                    <i class="far fa-quran"></i><span>Keagamaan</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/kategori') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/kategori" class="nav-link">Kategori</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/sub-kategori') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/sub-kategori" class="nav-link">Sub-Kategori</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/postingan') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/postingan" class="nav-link">Postingan</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/extra-pahala') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/extra-pahala" class="nav-link">Raih Extra Pahala</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/catatan-bersyukur') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/catatan-bersyukur" class="nav-link">Catatan
                                            Bersyukur</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/hisab-amal-buruk') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/hisab-amal-buruk" class="nav-link">Hisab Amal
                                            Buruk</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/kafarat-hutang') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/kafarat-hutang" class="nav-link">Catatan
                                            Kafarat/Hutang</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/permintaan-doa') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/permintaan-doa" class="nav-link">Permintaan Doa</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/catatan-ngaji') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/catatan-ngaji" class="nav-link">Catatan Ngaji</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/interaksi-alquran') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/interaksi-alquran" class="nav-link">Interaksi
                                            Al-Qur'an</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/keagamaan/pelajaran-hidup') ? 'active' : '' }}">
                                        <a href="/module/keagamaan/pelajaran-hidup" class="nav-link">Pelajaran
                                            Hidup</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item dropdown {{ str_contains(request()->path(), 'module/perkuliahan/') ? 'active' : '' }}">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                    <i class="far fa-user-graduate"></i><span>Perkuliahan</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/semester') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/semester" class="nav-link">Semester</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/dosen') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/dosen" class="nav-link">Dosen</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/mata-kuliah') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/mata-kuliah" class="nav-link">Mata Kuliah</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/jadwal') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/jadwal" class="nav-link">Jadwal</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/catatan') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/catatan" class="nav-link">Catatan</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/tugas') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/tugas" class="nav-link">Tugas</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/cloud') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/cloud" class="nav-link">Cloud</a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->is('module/perkuliahan/ppkp') ? 'active' : '' }}">
                                        <a href="/module/perkuliahan/ppkp" class="nav-link">PPKP</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Created By <a
                        href="http://fahmiibrahimdev.tech/">Fahmi Ibrahim</a>
                </div>
                <div class="footer-right">
                    1.0.1
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('/assets/midragon/select2/jquery.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/midragon/js/sweetalert2@11.js') }}"></script>
    @stack('js-libraries')

    <!-- Page Specific JS File -->
    <script src="{{ asset('/assets/stisla/js/stisla.js') }}"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail[0].message,
                text: event.detail[0].text,
                icon: event.detail[0].type,
            })
            $("#formDataModal").modal("hide");
        })
        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                title: event.detail[0].message,
                text: event.detail[0].text,
                icon: event.detail[0].type,
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete')
                }
            })
        })
        window.onbeforeunload = function() {
            window.scrollTo(5, 75);
        };
    </script>

    <!-- Template JS File -->
    <script src="{{ asset('/assets/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('/assets/stisla/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
