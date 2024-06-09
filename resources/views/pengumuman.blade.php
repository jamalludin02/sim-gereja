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
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
        <div class="container d-flex">
            <div class="" style="height: 50px">
                <a class="d-flex" href="#page-top" style="height: 100%; text-decoration: none">
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
                        <li class="nav-item"><a class="nav-link" href="/#layanan">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#tentang-gereja">Tentang Gereja</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#kegiatan-rutin">kegiatan Rutin</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#pengurus">Pengurus</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/pengumuman">Pengumuman</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary btn-sm"
                                href="{{ route('login') }}"><strong>Login</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="">
        <div class="container">
            @foreach ($data as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">
                            @php
                                $isi = strip_tags($item->isi);
                                $short = substr($isi, 0, 300);
                            @endphp
                            {!! $short !!}
                        </p>
                        <p class="card-text text-limit">
                            <small class="text-body-secondary ">{{ $item->created_at->diffForHumans() }}</small>
                            <br>
                            <a href=" {{ route('pengumuman-details', $item->id) }}}"> Selengkapnya >> </a>
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="w-full mt-5 justify-content-center">
                {{ $data->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </section>



    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
