@extends('admin.index')

@section('content-admin')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Data</div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('user.update', $data->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group my-2">
                        <label for="inputID">Id</label>
                        <input type="text" class="form-control" id="inputID" disabled value="{{ $data->id }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama"
                            value="{{ $data->nama }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="form-group my-2">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="L"
                                {{ $data->gender == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderMale">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="P"
                                {{ $data->gender == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderFemale">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="inputLingkungan">Lingkungan</label>
                        <select class="form-select" aria-label="Default select example" name="id_lingkungan"
                            id="inputLingkungan">
                            <option value="null" disabled>Pilih Lingkungan</option>
                            @foreach ($lingkungan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $data->id_lingkungan == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <div class="form-group my-2">
                            <label for="inputRole">Status User</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="inputRole">
                                <option value="null" disabled>Pilih Status User
                                </option>
                                <option value="ADMIN" {{ $data->role == 'ADMIN' ? 'selected' : '' }}>ADMIN
                                </option>
                                <option value="PENDETA" {{ $data->role == 'PENDETA' ? 'selected' : '' }}>PENDETA
                                </option>
                                <option value="UMAT" {{ $data->role == 'UMAT' ? 'selected' : '' }}>UMAT
                                </option>
                            </select>
                        </div>


                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                                role="button">Kembali</a>
                            <a href="{{ route('user.reset-password', $data->id) }}" class="btn btn-warning text-white btn-sm w-auto px-3 me-2"
                                role="button">Reset Password</a>
                            <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                                role="button">Hapus</a>
                            <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]"
                                type="submit">Simpan</button>
                        </div>
                </form>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header tw-justify-between">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                        <button type="button" class="btn-close btn-sm tw-text-black" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm tw-bg-[#6c757d]"
                            data-bs-dismiss="modal">Close</button>
                        <form method="POST" action="{{ route('user.destroy', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>
@endsection
