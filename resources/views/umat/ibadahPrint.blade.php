@extends('layouts.app')

@section('content')
    <div class="bg-white position-fixed top-0 start-0 w-100 h-100 p-3">
        <div class=" w-100 row d-flex mb-2 border-bottom border-dark" id="kop">
            <div class="col-3 float-end d-inline">
                <img src="{{ asset('home/assets/images/logo.png') }}" class="m-auto" alt="" width="125">
            </div>
            <div class="col-9 d-inline">
                <div class="text-start">
                    <p class="fs-5 fw-bold mb-1">Gereja Evangelis</p>
                    <p class=" mb-1"><span class="fw-semibold me-2">Alamat</span>: Jl. Jend. Sudirman No. 4 RT 1/RW 1
                        Banjarmasin 70114 – Kalimantan Selatan</p>
                    <p class=" mb-1"><span class="fw-semibold me-2">Telp./fax</span>: 0511-335.4856 / 436.5297</p>
                    <p class=" mb-1"><span class="fw-semibold me-2">Email</span>: 0511-335.4856 / 436.5297</p>
                </div>
            </div>
        </div>
        <div class="w-100 px-4 mb-2" id="body">
            <p class="text-center fw-bold fs-5"> Surat Validasi Ibadah Syukur</p>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="fw-bold">Acara</th>
                        <td>: Ibadah Syukur</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Pemilik Acara</th>
                        <td class="border-top">: {{ $data->user->nama }}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Id Sidi</th>
                        <td class="border-top">: {{$data->user->alamat}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Lingkungan</th>
                        <td class="border-top">: {{$data->lingkungan}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Tanggal</th>
                        <td class="border-top">: {{$data->tanggal}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Waktu</th>
                        <td class="border-top">: {{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Nama Pendeta</th>
                        <td class="border-top">: {{ $data->pendeta->nama }}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold border-top">Status Pengajuan</th>
                        <td class="border-top fw-semibold">: {{ $data->status }}</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="w-full">
                <div>
                    <p><span class="fw-semibold">*Catatan</span> : Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, libero.</p>
                </div>
            </div>
            <div class="w-100">
                <div class="w-auto float-end text-end">
                    <p>
                        <span class="fw-semibold">Banjarmasin,</span>
                        {{ date('d-m-Y') }}
                    </p>
                    <img src="{{ asset('home/assets/images/signature.png') }}" width="125" alt=""
                        class="d-block ms-auto me-4">
                    <p class="fw-semibold">Pengurus Gereja Evangelis</p>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to trigger print when document is ready
            function printA4Potrait() {
                window.print(); // Trigger print dialog
            }

            printA4Potrait(); // Call the print function when document is ready
        });
    </script>
@endpush
