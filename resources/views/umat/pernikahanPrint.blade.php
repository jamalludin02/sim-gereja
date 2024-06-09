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
        <div class="w-100 px-4 mb-2 page-break"  id="body">
            <p class="text-center fw-bold fs-5"> Bukti Surat Keanggotaan Sidi / Katekisasi</p>

            {{--  --}}
            <div class="">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Pengantin Pria</h5>
                        <p class="my-0"><strong>ID:</strong> {{ $data->laki_id }}</p>
                        <p class="my-0"><strong>ID Sidi:</strong> {{ $data->sidi_laki }}</p>
                        <p class="my-0"><strong>Nama:</strong> {{ $data->laki_nama }}</p>
                        <p class="my-0"><strong>Alamat:</strong> {{ $data->laki_alamat }}</p>
                        <p class="my-0"><strong>Gender:</strong> {{ $data->laki_gender }}</p>
                        <p class="my-0"><strong>Lingkungan:</strong> {{ $data->laki_lingkungan }}</p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <h5>Pengantin Wanita</h5>
                        <p class="my-0"><strong>ID:</strong> {{ $data->perempuan_id }}</p>
                        <p class="my-0"><strong>ID Sidi:</strong> {{ $data->sidi_perempuan }}</p>
                        <p class="my-0"><strong>Nama:</strong> {{ $data->perempuan_nama }}</p>
                        <p class="my-0"><strong>Alamat:</strong> {{ $data->perempuan_alamat }}</p>
                        <p class="my-0"><strong>Gender:</strong> {{ $data->perempuan_gender }}</p>
                        <p class="my-0"><strong>Lingkungan:</strong> {{ $data->perempuan_lingkungan }}</p>
                    </div>
                </div>
                {{-- <div class="page-break"></div> --}}
                <hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Detail Pernikahan</h5>
                        <p class="my-0"><strong>Tanggal:</strong>
                            {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}
                        </p>
                        <p class="my-0"><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}
                        </p>
                        <p class="my-0"><strong>Nama Pendeta:</strong> {{ $data->pendeta->nama ?? 'Belum ditentukan' }}</p>
                        <p class="my-0"><strong>Status:</strong> {{ $data->status }}</p>
                    </div>
                </div>
            </div>
            {{--  --}}

            <div class="w-full">
                <div>
                    <p><span class="fw-semibold">*Catatan</span> : Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, libero.</p>
                </div>
            </div>
            <div class="w-100 ">
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

@push('styles')
    <style>
         p {
             margin: 0 !important;
         }
        @media print {
            .page-break {
                clear: both;
                page-break-before: always;
            }
        }
    </style>
@endpush

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
