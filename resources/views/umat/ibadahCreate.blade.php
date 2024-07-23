@extends('umat.index')

@section('content-umat')
    <div class="container">
        <div class="px-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Form Pengajuan Acara Ibadah</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('ibadah-syukur.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="acara" class="form-label">Acara</label>
                                                    <input type="text" disabled class="form-control" id="acara"
                                                        name="acara" value="Ibadah Syukur">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pemilik_acara" class="form-label">Pemilik Acara</label>
                                                    <input type="text" disabled class="form-control" id="pemilik_acara"
                                                        name="pemilik_acara" value="{{ auth()->user()->nama }}">
                                                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" disabled class="form-control" id="alamat"
                                                        name="alamat" value="{{ auth()->user()->alamat }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <div id="sandbox-container">
                                                        <input id="tanggal" type="text" class="form-control"
                                                            name="tanggal" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktu" class="form-label">Waktu</label>
                                                    <input type="time" class="form-control" id="waktu"
                                                        name="waktu">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="id_pendeta" class="form-label">Pendeta</label>
                                                    <select name="id_pendeta" id="id_pendeta" class="form-select">
                                                        <option value="" selected disabled>Pilih Pendeta</option>
                                                        @foreach ($listPendeta as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <label for="acara" class="form-label">Table Jadwal Pendeta Berhalangan</label>
                                            {{-- <div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Pendeta</th>
                                                            <th scope="col">Hari</th>
                                                            <th scope="col">Waktu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listTglPendetaBerhalangan as $item)
                                                            <tr>
                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->waktu }}</td>
                                                                <td>{{ $item->hari }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($data as $item)
            <div class="card shadow p-5 m-3">
                <div class="row">
                    <div class="col">
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Acara :</p>
                            <p>Ibadah Syukur</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Pemilik Acara :</p>
                            <p>{{ $item->user->nama }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Alamat :</p>
                            <p>{{ $item->user->alamat }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Tanggal :</p>
                            <p>{{ $item->tanggal }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Waktu :</p>
                            <p>{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Nama Pendeta :</p>
                            <p>{{ $item->pendeta->nama }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex">
                            <p class="fw-semibold me-1">Keterangan :</p>
                            <p>{{ $item->keterangan ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                Status: {{ $item->status }}
            </div>
        @endforeach
    </div>
@endsection

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        var todayDate = new Date();
        var maxDate = new Date();
        maxDate.setDate(todayDate.getDate() + 2);
        var datesForDisable = ["2024-07-2", "2024-07-10", "2024-07-20"];

        function disableSpecificDates(date) {
            var string = $.datepicker.formatDate('yy-mm-dd', date);
            return [datesForDisable.indexOf(string) == -1];
        }

        $("#tanggal").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            beforeShowDay: function(date) {
                // var today = new Date();
                // var afterTwoDays = new Date();
                // afterTwoDays.setDate(today.getDate() + 2);
                // var isWithinRange = date >= today && date <= afterTwoDays;
                return [disableSpecificDates(date)[0], ''];
            }
        });
    });
</script>
