@extends('pendeta.index')
@section('content-pendeta')
<div class="container">
    @if (count($data) > 0)
    @foreach ($data as $index => $item)
    <div class="card my-3 shadow">
        <div class="card-header">
            Jadwal Acara Ibadah Syukur
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Acara :</p>
                        <p id="">Ibadah Syukur</p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Pemilik Acara :</p>
                        <p id="modalNama">{{$item->user->nama}}</p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Alamat :</p>
                        <p id="modalAlamat">{{$item->user->alamat}}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Tanggal :</p>
                        <p id="modalTanggal">{{$item->tanggal}}</p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Waktu :</p>
                        <p id="modalWaktu">{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Nama Pendeta :</p>
                        <p id="modalPendeta">{{auth()->user()->nama}}</p>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-primary">Setuju</a>
            <a href="{{ route('form-penolaka.pendeta', $item->id)}}" class="btn btn-danger">Tolak</a>
            <!-- Button trigger modal -->

        </div>
    </div>
    @endforeach

    @else
    <div class="alert alert-success text-center">
        <h1>Tidak ada pengajuan Ibadah Syukur</h1>
    </div>
    @endif

</div>
@endsection