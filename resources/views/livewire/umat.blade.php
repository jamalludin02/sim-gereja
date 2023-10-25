<!DOCTYPE html>
<html>
<head>
    <title>Login / Registrasi</title>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
    rel="stylesheet"
    />
    <link href="assets/images/logo.png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100">
<livewire:navigation/>

<div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
        <livewire:ibadah-syukur/>
        </div>
    </div>
</div>


<livewire:footer/>
    @livewireScripts
    <!-- <script>
$(document).ready(function() {
    $('#pilihPendeta').hide();
    $('#pilihJam').hide();
    var tanggal;
    var pendeta;
    $('#tanggal').on('change', function() {
        if ($(this).val() !== '') {
            $('#pilihPendeta').show();
        } else {
            $('#pilihPendeta').hide();
        }
    });

    $('#pilihJadwal').on('change',function(){
        var pendeta;
        tanggal = $('#tanggal').val()
        pendeta = $(this).val();
        if ($(this).val() !== '') {
            $('#pilihJam').show();
        } else {
            $('#pilihJam').hide();
        }
    })

    tanggal = $('#tanggal').val()
    pendeta = $('#pilihJadwal').val();
    $.ajax({
        type: "GET",
        url: "/getpendeta/" + tanggal + "/" + pendeta,
        success:function(response){
            if(response.getPendeta == 0){
                var jam = '<option class="form-control" value="11.00">11.00</option>'+'<option class="form-control" value="16.00">16.00</option>'
                $('#pilihJadwaljam').append(jam);
            } 
        }
        });
});
</script> -->
<script>
$(document).ready(function() {
    $('#pilihPendeta').hide();
    $('#pilihJam').hide();
    var tanggal;
    var pendeta;

    function callAjax() {
        $.ajax({
            type: "GET",
            url: "/getpendeta/" + tanggal + "/" + pendeta,
            success: function(response) {
                $('#pilihJadwaljam').empty();
                if (response.getPendeta == 0) {
                    var jam = '<option class="form-control" value="11.00">11.00</option>' +
                        '<option class="form-control" value="16.00">16.00</option>';
                    $('#pilihJadwaljam').append(jam);
                } 

                    $.each(response.getPendeta, function(index, data) {
                    if(data.jam == 16.00){
                    var jam = '<option class="form-control" value="11.00">11.00</option>';
                    $('#pilihJadwaljam').append(jam);
                    }  
                    if(data.jam == 11.00){
                    var jam = '<option class="form-control" value="16.00">16.00</option>';
                    $('#pilihJadwaljam').append(jam);
                    } 
                    if(data.jam == 11.00 && data.jam == 16.00){
                    var jam = '<option class="form-control">Jadwal Kosong</option>';
                    $('#pilihJadwaljam').append(jam);
                    } 
            });
                
            }
        });
    }

    $('#tanggal').on('change', function() {
        if ($(this).val() !== '') {
            $('#pilihPendeta').show();
            tanggal = $(this).val();
            callAjax();
        } else {
            $('#pilihPendeta').hide();
        }
    });

    $('#pilihJadwal').on('change', function() {
        if ($(this).val() !== '') {
            $('#pilihJam').show();
            pendeta = $(this).val();
            callAjax();
        } else {
            $('#pilihJam').hide();
        }
    });

    tanggal = $('#tanggal').val();
    pendeta = $('#pilihJadwal').val();
    callAjax();
});
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
    ></script>
</body>
</html>