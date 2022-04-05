<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            {{-- <a href="index.html"><img src="{{ asset("img/logo/logo.png") }}" alt="Logo" srcset=""></a> --}}
                            <h2>Volleyball</h2>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Elements</li>

                        <li
                            class="sidebar-item  has-sub {{ request()->routeIs('equipe.index') || request()->routeIs('equipe.create') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-megaphone" style="margin-top: -10px"></i>
                                <span>Equipe</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('equipe.index') }}">All Equipes</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('equipe.create') }}">Create Equipe</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="sidebar-item  has-sub {{ request()->routeIs('joueur.index') || request()->routeIs('joueur.create') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-megaphone" style="margin-top: -10px"></i>
                                <span>Joueur</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('joueur.index') }}">All Joueurs</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('joueur.create') }}">Create Joueur</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            @yield('content-back')
        </div>
    </div>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
