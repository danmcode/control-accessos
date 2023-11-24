<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            @can('accessDJAC',Auth::user())
            <a href="{{route('permission') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/pisa.png') }}" alt="">
                <span class=""> Protécnica Ingeniería </span>
            </a>
            @endcan
            @can('accessAGSJC',Auth::user())
            <a href="{{route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/pisa.png') }}" alt="">
                <span class=""> Protécnica Ingeniería </span>
            </a>
            @endcan
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                {{-- <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li> --}}
                <!-- End Notification Nav -->

                {{-- <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('images/messages-1.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('images/messages-2.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('images/messages-3.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav --> --}}

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->photo_path) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            {{ Auth::user()->name }}
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h6>
                            <span>{{Auth::user()->rol->name}}</span>
                        </li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}

                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>Mi perfil</span>
                            </a>
                        </li> --}}
                        @can('accessConfiguration', Auth::user())
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('configuration.index') }}">
                                <i class="bi bi-gear"></i>
                                <span>Configuración</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                    <i class="bi bi-door-open"></i> {{ __('Cerrar Sesión') }}
                                </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @can('accessAGSJC', Auth::user())
            <li class="nav-item">
                <a class="nav-link " href=" {{ route('home') }} ">
                    <i class="bi bi-house"></i>
                    <span>Inicio</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Control de accesos</li>
            <!-- Colaborators -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#colaborators-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span> {{ __('Colaboradores') }} </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="colaborators-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('colaboradores.index') }}">
                            <span>Ver colaboradores</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('colaboradores.create') }}">
                            <span>Crear colaboradores</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ingresos-salidas.index') }}">
                            <span>Ingresos y salidas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Colaborators Colaboradores -->

            <!-- visitors -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#visitors-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span> {{ __('Visitantes') }} </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="visitors-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('visitantes-index') }}">
                            <span>Ver visitantes</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            <!-- End visitors Colaboradores -->
            @can('accessAGSJCDJAC', Auth::user())
            <li class="nav-heading">Permisos</li>

            <!-- permissions -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#visitors-nav2" data-bs-toggle="collapse" href="#"">
                    <i class=" bi bi-person-check"></i>
                    <span>Permisos</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="visitors-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>

                        <a href="{{ route('permission') }}">
                            <span>Ver permisos</span>
                            @if(auth()->user()->unreadNotifications->count()>0)
                            <span class="badge text-bg-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                            @endif
                        </a>
                    </li>
                    @can('accessAGSJCC',Auth::user())
                    <li>
                        <a href="{{route('permission.create')}}">
                            <span>Crear permisos</span>
                        </a>
                    </li>
                    @endcan
                </ul>

            </li>
            <!-- End permissions -->

            <li class="nav-heading">Autorizaciones</li>


            <!-- autorizations -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('authorization')}}">
                    <i class="bi bi-building-add"></i>
                    <span>Autorizaciones</span>
                </a>
            </li>
            <!-- End autorizations -->
            @endcan
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Protecnica Ingenieria</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</body>


@yield('scripts')

</html>