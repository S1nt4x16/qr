<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Presensi RPL Research Center (RC)</title>
    <style>
        background-image: url('{{ asset('images/p.jpeg') }}')
    </style>
</head>
<body>
<div id="reader" width="600px"></div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);

        let id = decodedText;

        csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Succes',
            text: 'Berhasil Scannner',
            confirmButtonColor: '#308566',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ route('validasi') }}',
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token,
                        'QrCode': id
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            type: 'succes',
                            title: 'Success!',
                            text: 'Data has been deleted!'
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong'
                        })
                    }
                })
            }
        })
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