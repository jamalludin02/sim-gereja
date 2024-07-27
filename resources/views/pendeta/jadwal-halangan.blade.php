@extends('pendeta.index')
@section('content-pendeta')
    <div class="container">
        <div class="alert alert-warning shadow text-center">
            <h1 class="h3 fw-bold">Jadwal Halangan Pendeta</h1>
        </div>
        <div class="card mb-5 shadow">
            <div class="card-body">
                <div>
                    <!-- Tambahkan tombol model form disini -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                        Tambah Jadwal Halangan
                    </button>
                </div>
                <div>
                    @if (count($jadwalHalangan) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Pendeta</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwalHalangan as $item)
                                    <tr>
                                        <td>{{ $item->pendeta->nama }}</td>
                                        <th scope="row">{{ $item->tanggal }}</th>
                                        <td>{{ $item->waktu }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">Tidak ada jadwal ibadah syukur</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScheduleModalLabel">Tambah Jadwal Halangan Pendeta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jadwal-halangan.store.pendeta') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" name="waktu" id="waktu" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
