@extends('umat.index')

@section('content-umat')
    <div class="container">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('baptis-anak.create') }}">Tambah Data</a>
        </div>
        @foreach ($data as $item)
            <div class="card shadow my-3">
                <div class="card-header d-flex">
                    <p class="my-auto">Data Pengajuan Baptis Anak</p>
                    @if ($item->status == 'DITERIMA')
                        <a target="_blank" href="{{ route('baptis-anak-print.umat', $item->id) }}" class="ms-auto btn btn-sm btn-secondary d-flex py-0">
                            <p class="mx-2 my-auto">Cetak Surat Baptis Anak</p><i
                                class="my-auto bi bi-printer-fill ml-auto fs-6"></i>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row my-1">
                        <div class="col-md-2">Id Jemaat</div>
                        <div class="col-md">: {{ $item->user->id }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">Nama</div>
                        <div class="col-md">: {{ $item->user->nama }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">Nama Anak</div>
                        <div class="col-md">: {{ $item->nama_anak }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">Alamat</div>
                        <div class="col-md">: {{ $item->user->alamat }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">Lingkungan</div>
                        <div class="col-md">: {{ $item->lingkungan ?? '-' }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">Status Pengajuan</div>
                        <div class="col-md fw-bold">: {{ $item->status }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
