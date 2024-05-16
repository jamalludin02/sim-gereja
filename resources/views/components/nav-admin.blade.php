<div>
    <a href="/" class="nav-item nav-link active">Home</a>
    <a href="/halamanadmin" class="nav-item nav-link">Dashboard Admin</a>
    <a href="{{ route('logout') }}" class="nav-item nav-link"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
