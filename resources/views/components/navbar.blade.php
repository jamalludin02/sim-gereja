<div>
    <nav class="sb-topnav navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="px-5 d-flex w-100 justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">
                SIM-Gereja Evangelis
            </a>

            <button class="btn btn-link  order-1 order-lg-0 me-4 me-lg-0 fs-5" id="sidebarToggle" href="#!"
                style="color: #404040;"><i class="bi bi-list "></i></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- <li> <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"
                                href="#!" style="color: #404040;"><i class="bi-alarm"></i></button>
                        </li>
                        <li><a class="nav-link" href="/home">Home</a></li>
                        <li><a class="nav-link" href="/home">Home</a></li>
                        <li><a class="nav-link" href="/home">Home</a></li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <p class="fs-6 my-auto">{{ Auth::user()->name }}</p>
                            {{-- <a class="nav-link fs-6" id="logout" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> --}}
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
