@extends('umat.index')
@section('content-umat')
    <div class="container">
        <div class="alert alert-warning shadow text-center ">
            <h1 class="h3 fw-bold">Dashboard Umat</h1>
        </div>
        <div class="card shadow">
            <!-- <div class="card-header">
                                Data Pengajuan Ibadah
                              </div> -->
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="alert alert-sm alert-secondary my-auto py-auto">
                            <h1 class="h5 fw-bold my-auto">Data Ibadah Syukur</h1>
                        </div>
                        <div class="row d-flex">
                            <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->proses ?? 0 }}</p>
                            </div>
                            <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->ditolak ?? 0 }}</p>
                            </div>
                            <div class="col-sm m-3 text-end card bg-success text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->diterima ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="alert alert-sm alert-secondary my-auto py-auto ">
                            <h1 class="h5 fw-bold my-auto">Status Sidi</h1>
                        </div>
                        <div class="card mt-3 text-end card text-white p-3" style="background-color: #0d6efd">
                            <p class="card-title h5 fw-bold ">Status Verfikasi Sidi</p>
                            <hr>
                            @if($sidi)
                            <p class="my-3 h5">Terverifikasi <i class=" ms-3 bi bi-check-circle-fill"></i></p>
                            @else
                            <p class="my-3 h5">Belum Terverifikasi <i class="ms-3 bi bi-x-circle-fill"></i></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="alert alert-sm alert-secondary my-auto py-auto">
                            <h1 class="h5 fw-bold my-auto">Data Ibadah Syukur</h1>
                        </div>
                        <div class="row d-flex">
                            <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->proses ?? 0 }}</p>
                            </div>
                            <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->ditolak ?? 0 }}</p>
                            </div>
                            <div class="col-sm m-3 text-end card bg-success text-white p-3">
                                <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                                <hr>
                                <p class="my-3 h4">{{ $ibadah->diterima ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="alert alert-sm alert-secondary my-auto py-auto ">
                            <h1 class="h5 fw-bold my-auto">Status Pernikahan</h1>
                        </div>
                        <div class="card mt-3 text-end card text-white p-3" style="background-color: #0d6efd">
                            <p class="card-title h5 fw-bold ">Status Verfikasi Pernikahan</p>
                            <hr>
                            @if($sidi)
                            <p class="my-3 h5">Terverifikasi <i class=" ms-3 bi bi-check-circle-fill"></i></p>
                            @else
                            <p class="my-3 h5">Belum Terverifikasi <i class="ms-3 bi bi-x-circle-fill"></i></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
