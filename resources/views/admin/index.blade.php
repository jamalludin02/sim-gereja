@extends('layouts.app')

@section('content')
    <div id="layoutSidenav">
        <x-nav-admin></x-nav-admin>
        <div id="layoutSidenav_content" class="mt-5">
            @yield('content-admin')
        </div>
    </div>
@endsection


