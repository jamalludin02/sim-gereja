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

                <form method="POST" action="{{ route('sidi.update', $data->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group my-2">
                        <label for="inputID">Id</label>
                        <input disabled type="text" class="form-control" id="inputID" disabled
                            value="{{ $data->id }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="inputNama">Nama</label>
                        <input disabled type="text" class="form-control" id="inputNama" name="nama"
                            value="{{ $data->nama }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="inputEmail">Email</label>
                        <input disabled type="email" class="form-control" id="inputEmail" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="form-group my-2">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input disabled class="form-check-input" type="radio" name="gender" id="genderMale"
                                value="L" {{ $data->gender == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderMale">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input disabled class="form-check-input" type="radio" name="gender" id="genderFemale"
                                value="P" {{ $data->gender == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderFemale">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="inputLingkungan">Lingkungan</label>
                        <input type="text" class="form-control" id="inputLingkungan" disabled name="nama"
                            value="{{ $data->nama }}">
                        <div class="form-group my-2">
                            <label for="inputRole">Status User</label>
                            <select class="form-select" disabled aria-label="Default select example" name="role"
                                id="inputRole">
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


                        {{-- ------------------------- --}}
                        <div class="d-flex justify-content-center">
                            <div class="my-3 p-2 border border-2">
                                <embed id="previewPdf"
                                    src="{{ Storage::url($data->surat_baptis) }}"
                                    style="width:600px; height:800px;" frameborder="0">
                            </div>
                        </div>
                        {{-- ------------------------- --}}


                        {{-- <div class="form-group my-2">
                            <label for="inputFIle">Surat Baptis</label>
                            <input type="file" class="form-control border border-1" id="inputFIle"
                                value="{{ $data->id }}" accept="application/pdf" name="surat_baptis">
                            <span>
                                <li>Nama File: {{ $data->surat_baptis ?? '-' }}</li>
                            </span>
                        </div> --}}

                        <div class="form-group my-2">
                            <label for="inputRole">Status Anggota Sidi</label>
                            <select class="form-select" aria-label="Default select example" name="status" id="inputRole">
                                <option value="null" disabled>Pilih Status Pengajuan Anggota Sidi
                                </option>
                                <option value="PROSES" {{ $data->status == 'PROSES' ? 'selected' : '' }}>PROSES
                                </option>
                                <option value="DITERIMA" {{ $data->status == 'DITERIMA' ? 'selected' : '' }}>DITERIMA
                                </option>
                                <option value="DITOLAK" {{ $data->status == 'DITOLAK' ? 'selected' : '' }}>DITOLAK
                                </option>
                            </select>
                        </div>


                        {{-- <div class="row my-3">
                            <div class="col">
                                <label for="inputID">Id</label>
                                <input type="file" class="form-control" id="inputID"
                                    value="{{ $data->surat_baptis }}">
                                <span>
                                    <li> Nama file: {{ $data->surat_baptis }}.pdf</li>
                                </span>
                            </div>
                            <div class="col ">
                                <label for="previewPdf">Lingkungan</label>
                                <div class="border border-1 p-2">
                                    
                                </div>
                            </div>

                        </div> --}}


                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('sidi.index') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                                role="button">Kembali</a>
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
                        <form method="POST" action="{{ route('sidi.destroy', $data->id) }}">
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
