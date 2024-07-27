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
        <div class="w-100 px-4 mb-2 page-break" id="body">
            <p class="text-center fw-bold fs-5"> Bukti Surat Keanggotaan Sidi / Katekisasi</p>

            <div class="">
                <p class=" fw-bold fs-5"> Pengantin Pria</p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 150px">ID</th>
                            <td>{{ $data->laki_id }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">ID Sidi</th>
                            <td>{{ $data->sidi_laki }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Nama</th>
                            <td>{{ $data->laki_nama }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Alamat</th>
                            <td>{{ $data->laki_alamat }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Gender</th>
                            <td>{{ $data->laki_gender }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Lingkungan</th>
                            <td>{{ $data->laki_lingkungan }}</td>
                        </tr>
                    </tbody>
                </table>

                

                <p class=" fw-bold fs-5"> Pengantin Wanita</p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 150px">ID</th>
                            <td>{{ $data->perempuan_id }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">ID Sidi</th>
                            <td>{{ $data->sidi_perempuan }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Nama</th>
                            <td>{{ $data->perempuan_nama }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Alamat</th>
                            <td>{{ $data->perempuan_alamat }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Gender</th>
                            <td>{{ $data->perempuan_gender }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Lingkungan</th>
                            <td>{{ $data->perempuan_lingkungan }}</td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <p class=" fw-bold fs-5"> Detail Data Pernikahan</p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 150px">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Waktu</th>
                            <td>{{ \Carbon\Carbon::parse($data->waktu)->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Nama Pendeta</th>
                            <td>{{ $data->pendeta->nama ?? 'Belum ditentukan' }}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Status</th>
                            <td>{{ $data->status }}</td>
                        </tr>
                    </tbody>
                </table>
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

        .fixed-width-label {
            width: 50px !important;
            /* Sesuaikan dengan lebar yang Anda inginkan */
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
