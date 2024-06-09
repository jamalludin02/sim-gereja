@extends('umat.index')

@section('content-umat')
    <div class="container mt-5">
        <h2>Formulir Pendaftaran Baptis Anak</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('baptis-anak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_anak" class="form-label">Nama Anak</label>
                <input type="text" class="form-control" id="nama_anak" name="nama_anak" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>

            <div class="mb-3">
                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan baptis</label>
                <input type="date" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" required>
            </div>

            <div class="mb-3">
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan baptis</label>
                <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" required>
            </div>

            <div class="mb-3">
                <label for="akta_kelahiran" class="form-label">Akta Kelahiran</label>
                <input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran" accept=".pdf"
                    required>
            </div>

            <div class="mb-3">
                <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
                <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" accept=".pdf"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
