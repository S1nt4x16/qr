@extends('layouts.main')
@section('header')
@include('layouts.res')
@endsection
@section('title')
QR GENERATOR!
@endsection
@section('breadcrumb')
QR Generator
@endsection

@section('content')
<table class="table table-hover display responsive nowrap" id="table-qr" style="width:100%;">
  <thead>
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Angkatan</th>
        <th>Nrp</th>
        <th>Qr</th>
        <th>Edit</th>
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
        <td>
          @if ($a->jekel == 'L')
              Laki-Laki
          @else
              Perempuan
          @endif
        </td>
        <td>{{ $a->kelas }}</td>
        <td>{{ $a->angkatan }}</td>
        <td>{{ $a->nrp }}</td>
        <td>
          <a class="btn btn-secondary" href="{{ url('qr-generator/download-pdf/'.$a->id) }}" target="_blank"><i class="cil-print"></i></a>
        </td>
        <td>
          <a href="{{ url('/create-anggota/edit/'.$a->id) }}" class="btn btn-warning">Edit</a> 
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
@section('footer')
@include('layouts.res-js')
<script>
$(document).ready( function () {
    $('#table-qr').DataTable();
      responsive: true
} );
</script>
@endsection