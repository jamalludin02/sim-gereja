@extends('umat.index')

@section('content-umat')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow">
        @if ($data == null)
        <div class="card-header">
            <p class="my-auto">Data Pernikahan</p>
        </div>
        <div class="card-body text-center">

            @if ($errors->any())
            <button class="btn btn-primary my-5" disabled>Ajukan Pernikahan</button>
            @else
            <a href="{{ route('pernikahan.create') }}" class="btn btn-primary my-5">Ajukan Pernikahan</a>
            @endif

        </div>
        @else
        {{-- <div class="card-header"> --}}
        <div class="card-header d-flex">
            <p class="my-auto">Data Pernikahan</p>
            @if ($data->status == 'DITERIMA')
            <a target="_blank" href="{{ route('pernikahan-print.umat') }}" class="ms-auto btn btn-sm btn-secondary d-flex py-0">
                <p class="mx-2 my-auto">Cetak Surat Pernikahan</p><i class="my-auto bi bi-printer-fill ml-auto fs-6"></i>
            </a>
            @endif
        </div>
        <div class="card-body ">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Pengantin Pria</h5>
                        <p><strong>ID:</strong> {{ $data->laki_id }}</p>
                        <p><strong>ID Sidi:</strong> {{ $data->sidi_laki }}</p>
                        <p><strong>Nama:</strong> {{ $data->laki_nama }}</p>
                        <p><strong>Alamat:</strong> {{ $data->laki_alamat }}</p>
                        <p><strong>Gender:</strong> {{ $data->laki_gender }}</p>
                        <p><strong>Lingkungan:</strong> {{ $data->laki_lingkungan }}</p>
                        <p><strong>KTP:</strong> <a href="{{ asset('storage/' . $data->ktp_laki) }}" target="_blank">Lihat KTP</a></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Pengantin Wanita</h5>
                        <p><strong>ID:</strong> {{ $data->perempuan_id }}</p>
                        <p><strong>ID Sidi:</strong> {{ $data->sidi_perempuan }}</p>
                        <p><strong>Nama:</strong> {{ $data->perempuan_nama }}</p>
                        <p><strong>Alamat:</strong> {{ $data->perempuan_alamat }}</p>
                        <p><strong>Gender:</strong> {{ $data->perempuan_gender }}</p>
                        <p><strong>Lingkungan:</strong> {{ $data->perempuan_lingkungan }}</p>
                        <p><strong>KTP:</strong> <a href="{{ asset('storage/' . $data->ktp_perempuan) }}" target="_blank">Lihat KTP</a></p>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Detail Pernikahan</h5>
                        <p class="my-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}
                        </p>
                        <p class="my-1"><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}</p>
                        <p class="my-1"><strong>Nama Pendeta:</strong> {{ $data->pendeta->nama ?? 'Belum ditentukan' }}</p>
                        <p class="my-1"><strong>Status:</strong> {{ $data->status }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection