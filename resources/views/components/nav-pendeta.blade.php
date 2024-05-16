<div>
    <a href="/" class="nav-item nav-link active">Home</a>
    <a href="/jadwal" class="nav-item nav-link">Jadwal Ibadah</a>
    <div class="dropdown">
        <a href="" class="nav-item nav-link">Informasi</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/katekisasi">Daftar Peserta Katekisasi</a></li>
            <li><a class="dropdown-item" href="/baptis">Daftar Peserta Baptis</a></li>
            <li><a class="dropdown-item" href="/nikah">Daftar Umat Pemberkatan Nikah</a></li>
        </ul>
    </div>
    <a href="/validasi" class="nav-item nav-link">Validasi Pendaftaran</a>
    <a href="/pengumuman" class="nav-item nav-link">Pengumuman</a>
    <a href="/persembahan" class="nav-item nav-link">Jumlah Persembahan</a>
    <a href="/profil" class="nav-item nav-link">Profil</a>
    <a href="{{ route('logout') }}" class="nav-item nav-link"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
