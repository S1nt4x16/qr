<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Foreach</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    
<table class="table table-hover">
  <thead>
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Angkatan</th>
        <th>Nrp</th>
        <th>Qr</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($anggota as $a)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $a->name }}</td>
        <td>{{ $a->jekel }}</td>
        <td>{{ $a->kelas }}</td>
        <td>{{ $a->angkatan }}</td>
        <td>{{ $a->nrp }}</td>
        <td>
            {!! QrCode::size(400)->generate($a->id) !!}
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
</body>
</html>