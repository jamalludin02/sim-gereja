@extends('umat.index')

@section('content-umat')

    <div class="container">
        {{-- @dd($errors) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow mb-3">
            <div class="card-header d-flex">
                <p class="my-auto">Data Akun Jemaat</p>
            </div>
            <div class="card-body">
                <div class="row my-1">
                    <div class="col-md-2">Id Jemaat</div>
                    <div class="col-md">: {{ $data->id }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Nama</div>
                    <div class="col-md">: {{ $data->nama }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Email</div>
                    <div class="col-md">: {{ $data->email }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Alamat</div>
                    <div class="col-md">: {{ $data->alamat }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Jenis Kelamin</div>
                    <div class="col-md">: {{ $data->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Lingkungan</div>
                    <div class="col-md">: {{ $data->lingkungan->nama ?? '-' }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-md-2">Status Akun</div>
                    <div class="col-md">: {{ $data->role }}</div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-3">
            <div class="card-header d-flex">
                <p class="my-auto">Akun Setting</p>
            </div>
            <div class="card-body">
                <form action="{{ route('akun.update.umat', $data->id) }}" method="post">
                    @csrf
                    <div class="col-md ps-3">
                        <div class="row">
                            <div class="row col-md-6 mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Email</label>
                                <input type="email" class="col-md form-control" id="nama" name="email"
                                    value="{{ $data->email }}" required />
                            </div>
                            <div class="row col-md-6 mb-3 me-2">
                                <label for="oldPw" class="col-md-3 form-label pt-2 ps-0">Old Password</label>
                                <input type="password" class="col-md form-control" id="oldPw" name="oldPassword" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md-6 mb-3 me-2"></div>
                            <div class="row col-md-6 mb-3 me-2">
                                <label for="newPw" class="col-md-3 form-label pt-2 ps-0">New Password</label>
                                <input type="password" class="col-md form-control" id="newPw" name="newPassword" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md-6 mb-3 me-2"></div>
                            <div class="row col-md-6 mb-3 me-2">
                                <label for="confirmPw" class="col-md-3 form-label pt-2 ps-0">Confirm Password</label>
                                <input type="password" class="col-md form-control" id="confirmPw" name="confirmPassword" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pe-0 me-0">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan
                                perubahan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endsection
