@extends('admin.index')
@section('content-admin')
<div class="container">
    <div class="card my-3 shadow">
        <div class="card-header">
            Jadwal Acara Ibadah Syukur
        </div>
        <div class="card-body ">

            <div class="row">
                <div class="col my-3">
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Acara :</p>
                        <p id="">Ibadah Syukur</p>
                    </div>
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Pemilik Acara :</p>
                        <p id="modalNama">{{$data->user->nama}}</p>
                    </div>
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Alamat :</p>
                        <p id="modalAlamat">{{$data->user->alamat}}</p>
                    </div>
                </div>
                <div class="col my-3">
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Tanggal :</p>
                        <p id="modalTanggal">{{$data->tanggal}}</p>
                    </div>
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Waktu :</p>
                        <p id="modalWaktu">{{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}</p>
                    </div>
                    <div class="d-flex my-3">
                        <p class="fw-semibold me-1">Nama Pendeta :</p>
                        <p id="modalPendeta">{{$data->pendeta->nama ?? '-'}}</p>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end">
                <form action="{{ route('ibadah-syukur.update', $data->id) }}}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-success">Setujui Pengajuan</button>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tolak Pengajuan
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('store-penolakan.admin', $data->id) }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label fw-semibold">Alasan Penolakan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="waktu pada lingkungan anda bertabrakan dengan umat lain"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">SImpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
        </div>
    </div>
</div>
@endsection