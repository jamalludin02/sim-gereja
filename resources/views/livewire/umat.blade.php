<!DOCTYPE html>
<html>
<head>
    <title>Login / Registrasi</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
    rel="stylesheet"
    />
    <link href="assets/images/logo.png" rel="icon">
    @livewireStyles
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#0E172A;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarRightAlignExample"
      aria-controls="navbarRightAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarRightAlignExample">
    <a class="navbar-brand" href="/"><img src="assets/images/logo.png" width="50"/></a>
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Jumlah Persembahan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Hasil Validasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Pengumuman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Daftar Pendeta</a>
        </li>
        <li class="nav-item dropdown text-capitalize">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          Hallo, {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="/profil">Profil</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
              >Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

    <div class="container">
        <div class="mt-5 mb-5 px-4 py-4 justify-content-center">
        <livewire:ibadah-syukur/>
        <livewire:profil/> 
        </div>
    </div>

    <footer class="text-center text-lg-start">
  <div class="text-center p-3" style="background-color: #0E172A;color:white;">
    © 2023 Copyright:
    <a class="text-light" href="https://mdbootstrap.com/">Gereja Evangelis Kalimantan Sinta Kuala Kapuas</a>
  </div>
</footer>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
    ></script>
</body>
</html>