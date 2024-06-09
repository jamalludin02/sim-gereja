@extends('admin.index')

@section('content-admin')
    <div class="container">
        <div class="card">
            <div class="card-header">Tambah Data</div>

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

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group my-2">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama">
                    </div>
                    <div class="form-group my-2">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email">
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="form-group my-2">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="L">
                            <label class="form-check-label" for="genderMale">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="P">
                            <label class="form-check-label" for="genderFemale">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="inputLingkungan">Lingkungan</label>
                        <select class="form-select" aria-label="Default select example" name="id_lingkungan"
                            id="inputLingkungan">
                            <option value="null">Pilih Lingkungan</option>
                            @foreach ($lingkungan as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <div class="form-group my-2">
                            <label for="inputRole">Status User</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="inputRole">
                                <option value="null">Pilih Status User
                                </option>
                                <option value="ADMIN">ADMIN
                                </option>
                                <option value="PENDETA">PENDETA
                                </option>
                                <option value="UMAT">UMAT
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
