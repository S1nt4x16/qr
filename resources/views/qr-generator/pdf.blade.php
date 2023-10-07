<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>QR CODE PRESENSI KOPASUS IT</h1></center>
    <br>
    <br>
    <center><img src="{{ asset('storage/images/qrcode/'.$a->id.'.png') }}" alt=""></center>
    <br>
    <br>
    <br>
    <center><h2>{{ $a->name }}</h2></center>
    <br>
    <center><h2>{{ $a->angkatan }}</h2></center>
    <br>
    <center><h2>{{ $a->nrp }}</h2></center>
</body>
</html>