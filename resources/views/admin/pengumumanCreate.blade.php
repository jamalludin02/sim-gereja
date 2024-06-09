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

                <form action="{{ route('pengumuman.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul">
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleFormControlTextarea1">Isi Pengumuman</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi"></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
