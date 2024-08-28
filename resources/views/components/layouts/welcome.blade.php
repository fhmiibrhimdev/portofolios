<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to top left, #010022, black 150%);
            height: auto;
        }
    </style>
    <link rel="icon" type="image/png" href="{{ asset('icons/MIDRAGON.png') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/katex/katex.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body style="font-family: 'Inter', sans-serif; background-color: #010022;" class="tw-text-white tw-tracking-normal">

    {{-- <div style="background-image: url('https://t4.ftcdn.net/jpg/05/12/00/49/360_F_512004957_1Zjmq4zv674TPZpsLKNQ9BIt3kpCcsSV.jpg')" class="tw-hidden lg:tw-block tw-fixed tw-bg-cover tw-w-full tw-h-screen tw-opacity-5 tw-bg-repeat z-[-1]"></div> --}}


    <!-- Mobile menu bar -->
    <div id="navbar"
        class="tw-fixed tw-w-full tw-mt-0 tw-top-0 tw-text-gray-100 tw-flex tw-justify-between lg:tw-hidden drop-shadow-lg tw-z-[20]">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="tw-p-4 tw-text-white tw-font-bold tw-flex">
            <img src="{{ asset('icons/MIDRAGON.png') }}" class="tw-w-5 tw-h-5">
            <span class="tw-font-extrabold tw-uppercase tw-tracking-widest tw-ml-2">MIDRAGON</span>
        </a>
        <!-- Mobile menu button -->
        <button class="mobile-menu-button tw-p-4 focus:tw-outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <!-- Mobile menu bar -->

    <!-- Sidebar -->
    <div id="overlay" class="tw-fixed tw-inset-0 tw-bg-black tw-opacity-50 tw-hidden tw-z-40"></div>
    <div
        class="sidebar bg-slate-900 tw-w-64 lg:tw-hidden no-scrollbar tw-overflow-y-scroll tw-bg-slate-950 tw-h-screen tw-fixed tw-inset-y-0 tw-left-0 tw-transform -tw-translate-x-full tw-transition tw-duration-200 tw-ease-in-out md:tw-relative md:tw-translate-x-0 tw-z-50">
        <!-- logo -->
        <div class="tw-px-4 tw-pt-4 tw-flex tw-justify-center">
            <a href="#" class="tw-flex tw-space-x-2">
                <img src="{{ asset('icons/MIDRAGON.png') }}" class="tw-w-5 tw-h-5">
                <span class="tw-font-extrabold tw-uppercase tw-tracking-widest">MIDRAGON</span>
            </a>
        </div>

        <!-- nav -->
        <nav>
            <ul class="tw-list-none tw-p-0">
                <li class="mid-menu-header">MAIN MENU</li>
                <li class="mid-nav-link">
                    <a href="{{ url('/') }}" class="mid-nav-link-child">
                        <i class="fas fa-home"></i>
                        <span class="tw-ml-3">Home</span>
                    </a>

                </li>
                <li class="mid-nav-link">
                    <a href="{{ url('/articles') }}" class="mid-nav-link-child">
                        <i class="fas fa-blog"></i>
                        <span class="tw-ml-3.5">Article</span>
                    </a>
                </li>
                <li class="mid-nav-link">
                    <a href="{{ url('/project') }}" class="mid-nav-link-child">
                        <i class="fas fa-project-diagram"></i>
                        <span class="tw-ml-3">Project</span>
                    </a>
                </li>
                <li class="mid-nav-link">
                    <a href="{{ url('/course') }}" class="mid-nav-link-child">
                        <i class="fas fa-graduation-cap"></i>
                        <span class="tw-ml-3">Course</span>
                    </a>
                </li>
                <li class="mid-nav-link">
                    <a href="{{ url('religions') }}" class="mid-nav-link-child">
                        <i class="fas fa-quran"></i>
                        <span class="tw-ml-4">Religions</span>
                    </a>
                </li>
                <li class="mid-nav-link">
                    <a href="{{ url('lectures') }}" class="mid-nav-link-child">
                        <i class="fas fa-user-graduate"></i>
                        <span class="tw-ml-4">Lectures</span>
                    </a>
                </li>
            </ul>
            <div class="tw-my-12">
            </div>
        </nav>
    </div>

    <nav id="navbar" class="tw-hidden tw-bg-transparent tw-py-5 lg:tw-block">
        <div
            class="tw-container {{ request()->is('/') ? 'tw-max-w-7xl' : 'tw-max-w-2xl' }} tw-mx-auto tw-flex tw-justify-between tw-items-center">
            <a href="{{ url('') }}" class="text-cyan-200 tw-tracking-widest tw-text-xl tw-font-bold">
                <div
                    class="tw-inline-flex hover:tw-bg-gray-900 hover:tw-rounded-lg hover:tw-px-3 hover:tw-py-2 tw-mt-2">
                    <img src="{{ asset('icons/MIDRAGON.png') }}" class="tw-w-8 tw-h-8 tw-rounded-full">
                    <div class="tw-text-xs tw-tracking-wider tw-font-medium">
                        <p class="tw-ml-3 tw-text-cyan-400">Fahmi Ibrahim</p>
                        <p class="tw-ml-3">@fhmiibrhimdev</p>
                    </div>
                </div>
            </a>
            <ul class="tw-flex tw-text-sm tw-space-x-4 tw-list-none">
                <li><a href="{{ url('') }}"
                        class="{{ request()->is('/') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Home</a></li>
                <li><a href="{{ url('/articles') }}"
                        class="{{ request()->is('articles') || str_contains(request()->path(), 'articles') || str_contains(request()->path(), 'article') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Article</a>
                </li>
                <li><a href="{{ url('/project') }}"
                        class="{{ request()->is('project') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Project</a>
                </li>
                <li><a href="{{ url('/course') }}"
                        class="{{ request()->is('course') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Course</a>
                </li>
                <li><a href="{{ url('/religions') }}"
                        class="{{ request()->is('religions') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Religions</a>
                </li>
                <li><a href="{{ url('/lectures') }}"
                        class="{{ request()->is('lectures') ? 'tw-text-cyan-400' : 'tw-text-gray-400' }}">Lectures</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="tw-flex tw-flex-col tw-min-h-screen tw-mt-20 md:tw-mt-20 lg:tw-mt-20" id="main-content">
        <main>
            @yield('content')
        </main>

        <footer class="tw-bg-transparent tw-text-gray-500 tw-py-8 tw-mt-32">
            <div class="tw-container tw-mx-auto tw-text-center">
                <div id="social-media"
                    class="tw-hidden tw-justify-center tw-items-center tw-space-x-10 tw-mb-14 lg:tw-flex">
                    <ul class="tw-flex tw-space-x-10 tw-text-sm tw-text-gray-400 tw-font-semibold tw-list-none">
                        <li class="tw-ml-[-40px]"><a href="#" class="">Home</a></li>
                        <li><a href="#">Article</a></li>
                        <li><a href="#">Project</a></li>
                        <li><a href="#">Course</a></li>
                        <li><a href="#">Religions</a></li>
                        <li><a href="#">Lectures</a></li>
                    </ul>
                </div>
                <div id="social-media" class="tw-flex tw-justify-center tw-items-center tw-space-x-10 tw-mb-14">
                    <a href="https://facebook.com/fahmiibrahimdev" target="_BLANK"><i
                            class="fab fa-facebook tw-text-2xl"></i></a>
                    <a href="https://instagram.com/fahmiibrahimdev_" target="_BLANK"><i
                            class="fab fa-instagram tw-text-2xl"></i></a>
                    <a href="https://github.com/fhmiibrhimdev/" target="_BLANK"><i
                            class="fab fa-github tw-text-2xl"></i></a>
                    <a href="https://www.youtube.com/@midracode" target="_BLANK"><i
                            class="fab fa-youtube tw-text-2xl"></i></a>
                    <a href="https://www.linkedin.com/in/fahmiibrahimdev/" target="_BLANK"><i
                            class="fab fa-linkedin tw-text-2xl"></i></a>
                </div>
                <div id="copyright" class="tw-text-sm">
                    <p>&copy; 2023 Midragon. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts

    @stack('scripts')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="{{ asset('assets/katex/katex.min.js') }}"></script>
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");
        const overlay = document.querySelector("#overlay");
        const body = document.querySelector("body");

        btn.addEventListener("click", () => {
            sidebar.classList.toggle("-tw-translate-x-full");
            overlay.classList.toggle("tw-hidden");
            body.classList.toggle("tw-overflow-hidden");
            if (!sidebar.classList.contains("-tw-translate-x-full")) {
                overlay.classList.remove("tw-hidden");
                body.classList.add("tw-overflow-hidden");
            } else {
                overlay.classList.add("tw-hidden");
                body.classList.remove("tw-overflow-hidden");
            }
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.add("-tw-translate-x-full");
            overlay.classList.add("tw-hidden");
            body.classList.remove("tw-overflow-hidden");
        });
    </script>
    <script>
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(1, 0, 27, 0.5)';
                navbar.style.backdropFilter = 'blur(5px)';
            } else {
                navbar.style.backgroundColor = 'transparent';
                navbar.style.backdropFilter = 'none';
            }
        });
    </script>

</body>

</html>
