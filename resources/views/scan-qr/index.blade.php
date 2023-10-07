<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Presensi Kopasus IT</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
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
            <center><p><b>Atau</b></p></center>
            <center><p><b>Masukkan NRP Manual</b></p></center>
            <div class="row">
              <div class="col-10">
                <input type="text" name="nrpInput" id="nrpInput" class="form-control mb-3 bg-dark" style="color: white;" placeholder="Masukkan NRP" required autofocus> 
              </div>
              <div class="col-2">
                <button type="submit" onclick="OnInputNrp()" class="btn btn-success">OK</button>
              </div> 
            </div>
            <center><p><b>Ceklis Bagian Piket Jika Kalian Piket Hari Ini.</b></p></center> 
        </div>
</div>

<input type="hidden" name="result" id="result"> 

<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keterangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
      </div>
        <form action="{{ route('store') }}" method="post" id="formQR">
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
              <div class="spinner-border s text-success" style="display: none;" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <button type="submit" id="subb" class="btn btn-success">OK!</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalForm2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keterangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closee"></button>
      </div>
        <form action="{{ route('store') }}" method="post" id="formNrp">
            @csrf
            <input type="hidden" name="nrp" id="nrpInput2">
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
              <button type="button" class="btn btn-danger" id="batall" data-bs-dismiss="modal">Batal</button>
              <div class="spinner-border text-success" style="display: none;" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <button type="submit" id="sub" class="btn btn-success">OK!</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js' )}}"></script>
<script src="{{ asset('html5-qrcode/html5-qrcode.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    
    $('#close').click(function() {
      location.reload();
    });

    $('#batal').click(function() {
      location.reload();
    });

    $('#closee').click(function() {
      location.reload();
    });

    $('#batall').click(function() {
      location.reload();
    });

    $('#formNrp').submit(function() {
      $('.spinner-border').show();
      $('#sub').hide();
    });

    $('#formQR').submit(function() {
      $('.s').show();
      $('#subb').hide();
    });


    setTimeout(function () { 
      location.reload();
    }, 1800000);
    

    function OnInputNrp() 
    {

        if(document.getElementById("nrpInput").value.length == 0)
        {
          
          Swal.fire({
            title: 'Error!',
            text: 'Masukan NRP!',
            icon: 'error',
            confirmButtonText: 'Ok'
          })

        } else {

          var nrp = $('#nrpInput').val();
          $('#nrpInput2').val(nrp);
          $('#modalForm2').modal('show');
        }

    }


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