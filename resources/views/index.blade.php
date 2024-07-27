<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/images/logo.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container d-flex">
            <div class="" style="height: 50px">
                <a class="d-flex" href="#page-top" style="height: 100%; text-decoration: none">
                    <img src="{{ asset('home/assets/images/logo.png') }}" alt="..." width="50" />
                    <h4 class="my-auto mx-3"><strong>Gereja</strong> Evangelis</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
            </div>
            <div class="my-auto">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tentang-gereja">Tentang Gereja</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kegiatan-rutin">Kegiatan Rutin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pengurus">Pengurus</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/pengumuman">Pengumuman</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary btn-sm"
                                href="{{ route('login') }}"><strong>Login</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading text-uppercase">Selamat Datang</div>
            <div class="masthead-subheading">Di website resmi gereja Evangelis!</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#layanan">Selengkapnya</a>
        </div>
    </header>

    <!-- Layanan -->
    <section class="page-section" id="layanan">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Layanan</h2>
                <h3 class="section-subheading text-muted">Layanan yang disediakan oleh gereja.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <img class="fa-stack-1x fa-inverse" src="{{ asset('home/assets/images/ibadah.png') }}"
                            alt="" width="100">
                    </span>
                    <h4 class="my-3">Ibadah Syukur</h4>
                    <p class="text-muted">Ibadah Syukur adalah kebaktian khusus untuk mengucapkan terima kasih kepada
                        Tuhan atas berkat dan anugerah yang telah diterima.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <img class="fa-stack-1x fa-inverse" src="{{ asset('home/assets/images/baptism.png') }}"
                            alt="" width="90">
                    </span>
                    <h4 class="my-3">Baptis Anak</h4>
                    <p class="text-muted">Baptis Anak adalah upacara sakramen dalam agama Kristen di mana seorang anak
                        menerima berkat dan diakui sebagai anggota jemaat gereja.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <img class="fa-stack-1x fa-inverse" src="{{ asset('home/assets/images/pernikahan.png') }}"
                            alt="" width="90">
                    </span>
                    <h4 class="my-3">Pernikahan</h4>
                    <p class="text-muted">Pernikahan adalah sakramen di mana dua orang berkomitmen satu sama lain di
                        hadapan Tuhan dan jemaat, mengikat janji untuk hidup bersama dalam kasih dan kesetiaan.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <img class="fa-stack-1x fa-inverse" src="{{ asset('home/assets/images/ketekisasi.png') }}"
                            alt="" width="100">
                    </span>
                    <h4 class="my-3">SIDI / Katekisasi</h4>
                    <p class="text-muted">Sidi/Katekisasi adalah proses pendidikan dan pengajaran iman Kristen kepada
                        calon jemaat dewasa yang akan mengaku iman dan menjadi anggota penuh gereja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Gereja -->
    <section class="page-section" id="tentang-gereja">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tentang Gereja</h2>
                <h3 class="section-subheading text-muted">Tentang Gereja Evangelis.</h3>
            </div>
            <p class="text-start my-3">
                <strong>Sejarah GKE</strong>
                Perjalanan Gereja Kalimantan Evangelis (GKE) Sejak 1839
                Gereja Kalimantan Evangelis (GKE) didirikan pada 10 April 1839 sebagai Gereja Dayak Evangelis (GDE).
                Berkantor pusat di Kota Banjarmasin, Provinsi Kalimantan Selatan, GKE menyediakan pelayanan iman kepada
                suku-suku di pulau Kalimantan, termasuk suku Dayak, sambil membuka pelukan hangat bagi anggota
                Non-Dayak.
            </p>
            <p class="text-end my-3">
                Dengan pusat pelayanan dan kepemimpinan yang kokoh di Kota Banjarmasin, Provinsi Kalimantan Selatan, GKE
                telah mendedikasikan diri untuk memberikan pelayanan iman yang mendalam kepada masyarakat Kalimantan.
                Seiring berjalannya waktu, GKE tetap setia menyinari hati dan jiwa suku-suku yang termasuk dalam rumpun
                suku Dayak, menjalankan misi ilahi dengan cinta dan kasih.
            </p>
        </div>
    </section>

    <!-- Kegiatan Rutin -->
    <section id="kegiatan-rutin">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase">Kegiatan Rutin</h2>
            <h3 class="section-subheading text-muted">Kegiatan Rutin Ibadah syukur.</h3>
        </div>
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengurus -->
    <section class="page-section bg-light" id="pengurus">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Pengurus</h2>
                <h3 class="section-subheading text-muted">Anggota Pengurus Gereja Evangelis.</h3>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 my-5">
                    <div class="pengurus-member text-center">
                        <h4>Pdt. MARIYADI, M.Th</h4>
                        <p class="text-muted">Pengurus</p>
                        <a class=" mx-2" href="#!" aria-label="Parveen Anand Twitter Profile">082245543478</a>
                    </div>
                </div>
                <div class="col-lg-4 my-5">
                    <div class="pengurus-member text-center">
                        <h4>Pdt. FRANSISKA, M.Th</h4>
                        <p class="text-muted">Pengurus</p>
                        <a class=" mx-2" href="#!" aria-label="Parveen Anand Twitter Profile">082245543478</a>
                    </div>
                </div>
                <div class="col-lg-4 my-5">
                    <div class="pengurus-member text-center">
                        <h4>Pdt. YURA, S.Th</h4>
                        <p class="text-muted">Pengurus</p>
                        <a class=" mx-2" href="#!" aria-label="Parveen Anand Twitter Profile">082245543478</a>
                    </div>
                </div>
                <div class="col-lg-4 my-5">
                    <div class="pengurus-member text-center">
                        <h4>Pdt. YOESIANA, M.Th</h4>
                        <p class="text-muted">Pengurus</p>
                        <a class=" mx-2" href="#!" aria-label="Parveen Anand Twitter Profile">082245543478</a>
                    </div>
                </div>
                <div class="col-lg-4 my-5">
                    <div class="pengurus-member text-center">
                        <h4>Pdt. YULIANASARI, S.Th</h4>
                        <p class="text-muted">Pengurus</p>
                        <a class=" mx-2" href="#!" aria-label="Parveen Anand Twitter Profile">082245543478</a>
                    </div>
                </div>
            </div>
    </section>

    <!-- Contact -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Acara :</p>
                        <p id="modalAcara"></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Pemilik Acara :</p>
                        <p id="modalNama"></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Alamat :</p>
                        <p id="modalAlamat"></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Tanggal :</p>
                        <p id="modalTanggal"></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Waktu :</p>
                        <p id="modalWaktu"></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-semibold me-1">Nama Pendeta :</p>
                        <p id="modalPendeta"></p>
                    </div>



                    {{-- <p id="modalWaktu"></p>
                    <p id="modalPendeta"></p> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="closeModal()">Close</button>
                    <!-- Add additional buttons or actions here if needed -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
        const namaBulan = {
            0: 'Januari',
            1: 'Februari',
            2: 'Maret',
            3: 'April',
            4: 'Mei',
            5: 'Juni',
            6: 'Juli',
            7: 'Agustus',
            8: 'September',
            9: 'Oktober',
            10: 'November',
            11: 'Desember'
        };
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                eventClick: function(info) {
                    console.log(info);
                    if (info.event.url) {
                        alert(
                            'Clicked ' + info.event.title + '.\n' +
                            'Will open ' + info.event.url + ' in a new tab'
                        );
                        window.open(info.event.url);
                        return false; // prevents browser from following link in current tab.
                    } else {
                        $('#modalTitle').text(info.event.extendedProps.acara);
                        $('#modalAcara').text(info.event.extendedProps.acara);
                        $('#modalNama').text(info.event.title);
                        $('#modalAlamat').text(info.event.extendedProps.alamat);
                        $('#modalPendeta').text(info.event.extendedProps.pendeta);
                        $('#modalTanggal').text(info.event.start.toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        }));
                        var newTime = info.event.extendedProps.time;
                        var timeParts = newTime.split(
                            ':'); // Split time string into components (hours, minutes, seconds)
                        var formattedTime = timeParts[0] + ':' + timeParts[
                            1]; // Concatenate hours and minutes only
                        $('#modalWaktu').text(formattedTime + ' WIB - Selesai');
                        $('#myModal').modal('show');
                    }
                },
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($data as $event)
                        {
                            title: `
                                        @if ($event->acara === 'Pernikahan')
                                            {{ $event->userLaki->nama }} & {{ $event->userPerempuan->nama }}
                                        @else
                                            {{ $event->user->gender == 'P' ? 'Ibu ' : 'Bpk ' }} {{ $event->user->nama }}
                                        @endif
                                    `,
                            start: '{{ $event->tanggal }}',
                            extendedProps: {
                                acara: '{{ $event->acara }}',
                                nama: @if ($event->acara === 'Pernikahan')
                                    '{{ $event->userLaki->nama }} & {{ $event->userPerempuan->nama }}'
                                @else
                                    '{{ $event->user->nama }}'
                                @endif ,
                                alamat: @if ($event->acara === 'Pernikahan')
                                    'Gereja Evangelis'
                                @else
                                    '{{ $event->user->alamat }}'
                                @endif ,
                                lingkungan: @if ($event->acara === 'Pernikahan')
                                    '{{ $event->userLaki->lingkungan->nama ?? ' - ' }}'
                                @else
                                    '{{ $event->user->lingkungan->nama ?? ' - ' }}'
                                @endif ,
                                pendeta: `{{ $event->pendeta->nama ?? 'Belum Ditentukan' }}`,
                                time: '{{ $event->waktu }}'
                            },
                            backgroundColor: 
                            @if ($event->acara === 'Baptis Anak')
                                '#36BA98' /* Light Pink */
                            @elseif ($event->acara === 'Ibadah Syukur')
                                '#3FA2F6' /* Light Blue */
                            @elseif ($event->acara === 'Pernikahan')
                                '#FF4191' /* Pale Green */
                            @else
                                '#D3D3D3' /* Light Grey */ ,
                            @endif
                        },
                    @endforeach
                ],

                selectOverlap: function(event) {
                    return event.rendering === 'background';
                },
                titleFormat: function(info) {
                    return namaBulan[info.date.month] + ' ' + info.date.year;
                },


            });
            // console

            calendar.render();
        });


        function closeModal() {
            $('#myModal').removeClass('modal-open show');
            $('#myModal').modal('hide');

        }
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/get-jadwal')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.users.length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data Kosong',
                            text: 'Tidak ada data yang ditemukan.',
                        });
                    } else {
                        // Tampilkan data pengguna ke dalam console atau logika lainnya
                        console.log("User ID:", data.users[0].id);
                        console.log("User Name:", data.users[0].name);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat mengambil data.',
                    });
                });
        });
    </script> --}}

</body>

</html>
