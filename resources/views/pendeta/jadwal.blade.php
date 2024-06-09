@extends('pendeta.index')
@section('content-pendeta')
<div class="container">

    <div class="card mb-5 shadow">
        <div class="card-header">
            Jadwal Acara Ibadah Syukur
        </div>
        <div class="card-body">
            @if (count($ibadah) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Lingkungan</th>
                        <th scope="col">Acara</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ibadah as $item)
                    <tr>
                        <th scope="row">{{ $item->tanggal }}</th>
                        <td>{{ $item->waktu }}</td>
                        <td>Ibadah - Syukur Bpk/Ibu {{$item->user->nama}}</td>
                        <td>{{$item->user->lingkungan->nama}}</td>
                        <td>{{$item->user->alamat}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center">Tidak ada jadwal ibadah syukur</p>
            @endif
        </div>
    </div>
    <div class="card my-5 shadow">
        <div class="card-header">
            Jadwal Acara Pernikahan
        </div>
        <div class="card-body">
            @if (count($pernikahan) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Pasangan</th>
                        <th scope="col">Tempat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pernikahan as $item)
                    <tr>
                        <th scope="row">{{ $item->tanggal }}</th>
                        <td>{{ $item->waktu }}</td>
                        <td>Perikahan  </td>
                        <td>{{ $item->userLaki->nama }} & {{ $item->userPerempuan->nama }}</td>
                        <td>Gereja Evangelis</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center">Tidak ada jadwal Pernikahan</p>
            @endif
        </div>
    </div>
</div>
@endsection