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
        <form action="{{ route('pernikahan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- /////////////////////////////////////////// --}}
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                @if (Auth::user()->gender == 'L')
                    <input disabled type="text" class="form-control" name="id_user_laki" value="{{ Auth::user()->id }}"
                        required>
                    <input type="hidden" class="form-control" name="id_user_laki" value="{{ Auth::user()->id }}"
                        required>
                @else
                    <input disabled type="text" class="form-control" name="id_user_perempuan"
                        value="{{ Auth::user()->id }}" required>
                        <input type="hidden" class="form-control" name="id_user_perempuan" value="{{ Auth::user()->id }}"
                        required>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">ID Sidi</label>
                @if (Auth::user()->gender == 'L')
                    <input disabled type="text" class="form-control" name="sidi_laki" value="{{ $sidi->id }}"
                        required>
                         <input type="hidden" class="form-control" name="sidi_laki" value="{{ $sidi->id }}"
                        required>
                @else
                    <input disabled type="text" class="form-control" name="sidi_perempuan" value="{{ $sidi->id }}"
                        required>
                         <input type="hidden" class="form-control" name="sidi_perempuan" value="{{ $sidi->id }}"
                        required>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">ID Pasangan</label>
                @if (Auth::user()->gender == 'L')
                    <input type="text" class="form-control" name="id_user_perempuan" required>
                @else
                    <input type="text" class="form-control" name="id_user_laki" required>
                @endif
            </div>
            <div class="mb-3">
                <label for="id" class="form-label">ID Sidi Pasangan</label>
                @if (Auth::user()->gender == 'L')
                    <input type="text" class="form-control" name="sidi_perempuan" required>
                @else
                    <input type="text" class="form-control" name="sidi_laki" required>
                @endif
            </div>

            <div class="mb-3">
                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan Pernikahan</label>
                <input type="date" class="form-control" id="tgl_pelaksanaan" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan Pernikahan</label>
                <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu" required>
            </div>

            <div class="mb-3">
                <label class="form-label">KTP</label>
                @if (Auth::user()->gender == 'L')
                    <input type="file" class="form-control" name="ktp_laki" accept=".pdf" required>
                @else
                    <input type="file" class="form-control" name="ktp_perempuan" accept=".pdf" required>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">KTP Pasangan</label>
                @if (Auth::user()->gender == 'L')
                    <input type="file" class="form-control" name="ktp_perempuan" accept=".pdf" required>
                @else
                    <input type="file" class="form-control" name="ktp_laki" accept=".pdf" required>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
