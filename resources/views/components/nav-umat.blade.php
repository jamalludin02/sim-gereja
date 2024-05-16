<div>
    <a href="/" class="nav-item nav-link active">Home</a>
    <a href="/validasi" class="nav-item nav-link">Hasil Validasi</a>
    <a href="/pengumuman" class="nav-item nav-link">Pengumuman</a>
    <a href="/jadwal" class="nav-item nav-link">Daftar Pendeta</a>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Pendaftaran
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/ibadah">Daftar Ibadah Syukur</a>
            <a class="dropdown-item" href="/baptis">Daftar Baptis</a>
            <a class="dropdown-item" href="/katekisasi">Daftar Katekisasi</a>
            <a class="dropdown-item" href="/nikah">Pemberkatan Nikah</a>
        </div>
    </li>
    <a href="/profil" class="nav-item nav-link">Profil</a>
    <a href="{{ route('logout') }}" class="nav-item nav-link"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
