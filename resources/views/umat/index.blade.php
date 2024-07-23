<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
        <div class="container d-flex">
            <div class="" style="height: 50px">
                <a class="d-flex" href="{{ route('admin.dashboard') }}" style="height: 100%; text-decoration: none">
                    <img src="{{ asset('home/assets/images/logo.png') }}" alt="..." width="50" />
                    <h4 class="my-auto mx-3"><strong>Gereja</strong> Evangelis</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
            </div>
            <div class="my-auto">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto  py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('umat.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/umat/ibadah-syukur">Pengajuan Ibadah Syukur</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/umat/baptis-anak">Baptis Anak</a></li>
                        <li class="nav-item"><a class="nav-link" href="/umat/sidi">Sidi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/umat/pernikahan">Pernikahan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/umat/akun">Akun</a></li>

                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->nama }} 
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/umat/akun">Setting Akun</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" id="logout"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{-- <div class="sb-nav-link-icon me-3" style="color: #f8f9fa"></div> --}}
                                            <strong>Logout</strong>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link btn btn-primary btn-sm"
                                    href="{{ route('login') }}"><strong>Login</strong></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="">
        <div class="container">
            @yield('content-umat')
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
