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

            <form method="POST" action="{{ route('lingkungan.update', $data->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Lingkungan</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="{{ $data->nama }}">
                </div>
                <div class="form-group my-3">
                    <label for="exampleFormControlTextarea1">Alamat Lingkungan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $data->alamat }}</textarea>
                </div>

                <div class="d-flex justify-content-end pe-0 me-0">
                    <a href="{{ route('lingkungan.index') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2" role="button">Kembali</a>
                    <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal" role="button">Hapus</a>
                    <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]" type="submit">Simpan</button>
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
                    <button type="button" class="btn-close btn-sm tw-text-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm tw-bg-[#6c757d]" data-bs-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('lingkungan.destroy', $data->id) }}">
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
