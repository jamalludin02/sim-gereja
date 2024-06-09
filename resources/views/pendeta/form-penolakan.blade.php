@extends('pendeta.index')
@section('content-pendeta')
<div class="container">
    <form action="{{ route('store-penolakan.pendeta', $data->id) }}" method="POST">
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
                            <p id="modalNama">{{$data->user->nama}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Alamat :</p>
                            <p id="modalAlamat">{{$data->user->alamat}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Tanggal :</p>
                            <p id="modalTanggal">{{$data->tanggal}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Waktu :</p>
                            <p id="modalWaktu">{{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Nama Pendeta :</p>
                            <p id="modalPendeta">{{auth()->user()->nama}}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label fw-semibold">Alasan Penolakan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <button  type="submit" class="btn btn-success">Simpan</button>
                <!-- Button trigger modal -->
            </div>
        </div>
    </form>


</div>
@endsection