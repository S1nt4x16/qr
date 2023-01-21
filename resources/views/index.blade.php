<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Presensi RPL Research Center (RC)</title>
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

<div class="card bg-dark border-primary text-light">
        <div class="card-header mb-2 text-primary">
            <center><h1>PRESENSI RPL RESEARCH CENTER (RC)</h1></center>
        </div>
        <div class="card-body">
            <button class="btn btn-info" onclick="alertFnc()"></button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">From Keterangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form-push">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-4">
                <center>
                    <input type="checkbox" name="piket" id="piket">
                    <label for="piket">Ceklis Bagian Ini Jika Kalian Piket</label>
                </center>
            </div>
            <div class="mt-4">
                <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan Apa Hasil Eksplorasi Kalian" id="exampleInputPassword1">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">OK!</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    function alertFnc() {
        console.log('y');
        $('#modalForm').modal('show');
        // Swal.fire({
        //     title: 'Error!',
        //     text: 'Do you want to continue',
        //     icon: 'error',
        //     confirmButtonText: 'Cool'
        // });
    }
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);
        // alert(decodedText)
        // $('#result').val(decodedText);
        // let id = decodedText;

        var id = decodedText;

        html5QrcodeScanner.clear().then(_ => {
            // console.log(id);
            $('#id').val(id);

            $('#modalForm').modal('show');
            
            // Swal.fire({
            //     title: 'Error!',
            //     text: 'Do you want to continue',
            //     icon: 'error',
            //     confirmButtonText: 'Cool'
            // });
            // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // $.ajax({
                
            //     url: "{{ route('validasi') }}",
            //     type: 'POST',            
            //     data: {
            //         _methode : "POST",
            //         _token: CSRF_TOKEN, 
            //         qr_code : id
            //     },            
            //     success: function (response) { 
            //         console.log(response);
            //         if(response.status == 200){
            //             alert('berhasil');
            //         }else{
            //             alert('gagal');
            //         }
                    
            //     }
            // });   
        }).catch(error => {
            alert('something wrong');
        });

        // csrf_token = $('meta[name="csrf-token"]').attr('content');

        

        

        // Swal.fire({
        //     title: 'Succes',
        //     text: 'Berhasil Scannner',
        //     confirmButtonColor: '#308566',
        //     confirmButtonText: 'Ok'
        // }).then((result) => {
        //     if (result.value) {
        //         $.ajax({
        //             url: '{{ route('validasi') }}',
        //             type: 'POST',
        //             data: {
        //                 '_method': 'DELETE',
        //                 '_token': csrf_token,
        //                 'QrCode': id
        //             },
        //             success: function (response) {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     type: 'succes',
        //                     title: 'Success!',
        //                     text: 'Data has been deleted!'
        //                 });
        //             },
        //             error: function (xhr) {
        //                 Swal.fire({
        //                     type: 'error',
        //                     title: 'Oops...',
        //                     text: 'Something went wrong'
        //                 })
        //             }
        //         })
        //     }
        // })
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</body>
</html>