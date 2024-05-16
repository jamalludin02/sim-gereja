<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/images/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        /* Set the width of the sidebar to 120px */
        .w3-sidebar {
            width: 120px;
            background: red;
        }

        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        #main {
            margin-left: 120px
        }

        /* Remove margins from "page content" on small screens */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0
            }
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .btn.active {
            background-color: #292b2c;
            color: #fff;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @livewireStyles
</head>

<body class="w3-white">

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center w3-red">
        <!-- Avatar image in top left corner -->
        <img src="assets/images/logo.png" style="width:100%">
        <p>HOME ADMIN</p>
        <a href="" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-bar-chart w3-xxlarge"></i>
            <p>Dashboard</p>
        </a>
        <a href="/halamanadmin" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-envelope w3-xxlarge"></i>
            <p>Daftar Surat</p>
        </a>
        <a href="/halamanlingkungan" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-users w3-xxlarge"></i>
            <p>Daftar Lingkungan</p>
        </a>
        <a href="/halamankatekisasi" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-users w3-xxlarge"></i>
            <p>Daftar Peserta Katekisasi</p>
        </a>
        <a href="/halamanbaptis" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-users w3-xxlarge"></i>
            <p>Daftar Peserta Baptis</p>
        </a>
        <a href="/halamanberkatnikah" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-users w3-xxlarge"></i>
            <p>Daftar Pemberkatan Nikah</p>
        </a>
        <a href="/halamanpendeta" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>Daftar Pendeta</p>
        </a>
        <a href="/halamanpengumuman" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-bullhorn w3-xxlarge"></i>
            <p>Add Pengumuman</p>
        </a>
        <a href="/halamanpersembahan" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-bar-chart-o w3-xxlarge"></i>
            <p>Data Persembahan</p>
        </a>
        <a href="/halamanumat" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-address-book w3-xxlarge"></i>
            <p>Data Umat</p>
        </a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-red">
            <i class="fa fa-sign-out w3-xxlarge"></i>
            <p>Logout</p>
        </a>
    </nav>


    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
            <h1 class="w3-jumbo"><span class="w3-hide-small">Daftar Pengajuan Surat Ibadah</h1>
            <marquee direction=”left” scrollamount=”2″ align=”center”><b>-- Selamat Datang Admin! --</b></marquee>
        </header>
        <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
            <livewire:data-surat />
            <!-- END PAGE CONTENT -->
            @livewireScripts
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
            <script>
                $('.terima').on('click', function() {
                    Swal.fire({
                        title: 'Pengajuan Ibadah Berhasil Diterima',
                        text: 'Silahkan Upload Surat Ibadah.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
            <script>
                $('.tolak').on('click', function() {
                    Swal.fire({
                        title: 'Pengajuan Ibadah Ditolak',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>

            <script>
                $('.backs').on('click', function() {
                    Swal.fire({
                        title: 'Pengajuan Ibadah Ditolak',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        </div>
    </div>
</body>

</html>
