@extends('admin.index')
@section('content-admin')
<div class="container">
    <div class="alert alert-warning shadow text-center ">
        <h1 class="h3 fw-bold">Dashboard Admin</h1>
    </div>
    <div class="card shadow">
        <!-- <div class="card-header">
    Data Pengajuan Ibadah
  </div> -->
        <div class="card-body ">
            <div class="alert alert-sm alert-secondary my-auto py-auto">
                <h1 class="h5 fw-bold my-auto">Data Ibadah Syukur</h1>
            </div>
            <div class="row d-flex">
                <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                    <hr>
                    <p class="my-3 h4">{{$ibadah->proses ?? 0}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                    <hr>
                    <p class="my-3 h4">{{$ibadah->ditolak ?? 0}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-success text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                    <hr>
                    <p class="my-3 h4">{{$ibadah->diterima ?? 0}}</p>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="alert alert-sm alert-secondary my-auto py-auto">
                <h1 class="h5 fw-bold my-auto">Data Sidi</h1>
            </div>
            <div class="row d-flex">
                <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                    <hr>
                    <p class="my-3 h4">{{$sidi->proses}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                    <hr>
                    <p class="my-3 h4">{{$sidi->ditolak}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-success text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                    <hr>
                    <p class="my-3 h4">{{$sidi->diterima}}</p>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="alert alert-sm alert-secondary my-auto py-auto ">
                <h1 class="h5 fw-bold my-auto">Data Baptis Anak</h1>
            </div>
            <div class="row d-flex">
                <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                    <hr>
                    <p class="my-3 h4">{{$baptis->proses}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                    <hr>
                    <p class="my-3 h4">{{$baptis->ditolak}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-success text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                    <hr>
                    <p class="my-3 h4">{{$baptis->diterima}}</p>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="alert alert-sm alert-secondary my-auto py-auto ">
                <h1 class="h5 fw-bold my-auto">Data Pernikahan</h1>
            </div>
            <div class="row d-flex">
                <div class="col-sm m-3 text-end card bg-warning text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Proses</p>
                    <hr>
                    <p class="my-3 h4">{{$pernikahan->proses}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-danger text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Ditolak</p>
                    <hr>
                    <p class="my-3 h4">{{$pernikahan->ditolak}}</p>
                </div>
                <div class="col-sm m-3 text-end card bg-success text-white p-3">
                    <p class="card-title h5 fw-bold ">Jumlah Pengajuan Disetujui</p>
                    <hr>
                    <p class="my-3 h4">{{$pernikahan->diterima}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection