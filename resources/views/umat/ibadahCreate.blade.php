@extends('umat.index')

@section('content-umat')
<div class="container">


    <div class=" px-3">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header " id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong class="">Form Pengajuan Acara Ibadah</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('ibadah-syukur.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="acara" class="form-label">Acara</label>
                                        <input type="text" disabled class="form-control" id="acara" name="acara" value="Ibadah Syukur">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pemilik_acara" class="form-label">Pemilik Acara</label>
                                        <input type="text" disabled class="form-control" id="pemilik_acara" name="pemilik_acara" value="{{auth()->user()->nama}}">
                                        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" disabled class="form-control" id="alamat" name="alamat" value="{{auth()->user()->alamat}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" class="form-control" id="waktu" name="waktu">
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_pendeta" class="form-label">Pendeta</label>
                                        <select name="id_pendeta" id="id_pendeta" class="form-select">
                                            <option value="" selected disabled>Pilih Pendeta</option>
                                            @foreach ($listPendeta as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @foreach ($data as $item )
    <div class="card shadow p-5 m-3">
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
                    <p id="modalPendeta">{{$item->pendeta->nama}}</p>
                </div>
            </div>
        </div>
        <hr>
        Status: {{$item->status}}
    </div>
    @endforeach
</div>
@endsection