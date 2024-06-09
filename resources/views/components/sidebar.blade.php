<div>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion" style="background-color: #FA7070">
            <div class="sb-sidenav-menu">
                <div class="nav fs-6"style="color: #ffffff">
                    {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-speedometer2" style="color: #f8f9fa"></i>
                        </div>
                        Dashboard
                    </a>
                    <hr>
                    <a class="nav-link" href="{{ route('lingkungan.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-pin-map-fill"></i>
                        </div>
                        Lingkungan
                    </a>
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-people-fill"></i>
                        </div>
                        User / Jemaat
                    </a>
                    <a class="nav-link" href="{{ route('ibadah-syukur.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-book-half"></i>
                        </div>
                        Ibadah Syukur <span class="badge badge-warning bg-warning ms-auto my-auto">{{ $ibadah }}</span>
                    </a>
                    <a class="nav-link" href="{{ route('sidi.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-bank"></i>
                        </div>
                        Sidi <span class="badge badge-warning bg-warning ms-auto my-auto">{{ $sidi }}</span>
                    </a>
                    <a class="nav-link" href="{{ route('baptis-anak.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-person-check-fill"></i>
                        </div>
                        Baptis anak <span class="badge badge-warning bg-warning ms-auto my-auto">{{ $baptis }}</span>
                    </a>
                    <a class="nav-link" href="{{ route('pernikahan.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi fs-5 bi-gender-ambiguous"></i>
                        </div>
                        Pernikahan  <span class="badge badge-warning bg-warning ms-auto my-auto">{{ $pernikahan }}</span>
                    </a>
                    <a class="nav-link" href="{{ route('pengumuman.index') }}">
                        <div class="sb-nav-link-icon me-3"><i class="bi bi-megaphone-fill"></i>
                        </div>
                        Pengumuman
                    </a>



                    <hr>
                    <li class="mb-3">
                        <a class="nav-link fs-6" id="logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="sb-nav-link-icon me-3" style="color: #f8f9fa"><i
                                    class="bi bi-box-arrow-right"></i></div> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
            </div>
        </nav>
    </div>
</div>
