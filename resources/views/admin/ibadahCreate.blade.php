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

                <form action="{{ route('ibadah-syukur.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputLingkungan">Lingkungan</label>
                        <select class="form-select" aria-label="Default select example" name="id_lingkungan"
                            id="inputLingkungan">
                            <option value="null" selected>Pilih Lingkungan</option>
                            @foreach ($lingkungan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="senin">Senin</label>
                        <input type="time" class="form-control" id="senin" name="senin">
                    </div>
                    <div class="form-group my-2">
                        <label for="selasa">Selasa</label>
                        <input type="time" class="form-control" id="selasa" name="selasa">
                    </div>
                    <div class="form-group my-2">
                        <label for="rabu">Rabu</label>
                        <input type="time" class="form-control" id="rabu" name="rabu">
                    </div>
                    <div class="form-group my-2">
                        <label for="kamis">Kamis</label>
                        <input type="time" class="form-control" id="kamis" name="kamis">
                    </div>
                    <div class="form-group my-2">
                        <label for="jumat">Jumat</label>
                        <input type="time" class="form-control" id="jumat" name="jumat">
                    </div>
                    <div class="form-group my-2">
                        <label for="sabtu">Sabtu</label>
                        <input type="time" class="form-control" id="sabtu" name="sabtu">
                    </div>
                    <div class="form-group my-2">
                        <label for="minggu">Minggu</label>
                        <input type="time" class="form-control" id="minggu" name="minggu">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
