<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Presensi Kopasus IT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{ asset('images/p.jpeg') }}');
            background-size: cover; 
        }

        #reader {
          width : "200px" !important;
          height : "200px" !important;
        }

        .card {
          margin-top: 7%;
          margin-left: 25%;
          width: 50%;
          border-radius: 25px;
        }
        .card-body {
          text-align: -webkit-center;
        }


    </style>
</head>
<body>

@include('layouts.message')

<div class="card bg-dark border-primary text-light">
        <div class="card-header mb-2 text-primary">
            <center><h1>PRESENSI KOPASUS IT</h1></center>
        </div>
        <div class="card-body">
            <div class="card-title mb-4"><center><h2>SCAN YOUR QR CODE HERE</h2></center></div>
          <div id="reader" style="width:600px;"></div>
        </div>
        <div class="card-footer">
            <center><p><b>Ceklis Bagian Piket Jika Kalian Piket Hari Ini.</b></p></center> 
        </div>
</div>
<input type="hidden" name="result" id="result">


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keterangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
      </div>
        <form action="{{ route('store') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-4 mt-4">
                <center>
                    <input type="checkbox" name="piket" id="piket">
                    <label for="piket">Ceklis Bagian Ini Jika Kalian Piket</label>
                </center>
            </div>
            <div class="m-4">
                <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan Apa Hasil Eksplorasi Kalian" id="exampleInputPassword1" required autofocus>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="batal" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-success">OK!</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    
    $('#close').click(function() {
      location.reload();
    });

    $('#batal').click(function() {
      location.reload();
    });

    function onScanSuccess(decodedText, decodedResult) {
        

        var id = decodedText;

        html5QrcodeScanner.clear().then(_ => {
            $('#id').val(id);

            $('#modalForm').modal('show');
            
        }).catch(error => {
            alert('something wrong');
        });

    }

    function onScanFailure(error) {
 
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</body>
</html>