@extends('layouts.main')
@section('header')
@include('layouts.res')
@endsection
@section('title')
Welcome Admin!
@endsection
@section('breadcrumb')
Report Presensi
@endsection

@section('content')
<div class="row">
  <div class="col-xxl-12 col-lg-12">
      <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#download" data-coreui-name="Report Presensi" data-coreui-url="{{ route('excelexport') }}">Download Data</button>
            <button type="button" class="btn btn-danger" data-coreui-toggle="modal" data-coreui-target="#hapus" data-coreui-name="All Data" data-coreui-url="{{ route('deleteall') }}">Delete All</button>
          </div>
          <div class="card-body">
          <table id="table-report" class="display responsive nowrap" style="width:100%;">
              <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Angkatan</th>
                        <th>NRP</th>
                        <th>Status</th>
                        <th>Piket</th>
                        <th>Keterangan</th>
                        <th>Presensi Masuk/Keluar</th>
                    </tr>
              </thead>
              <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach ($report as $r)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $r->name }}</td>
                      <td>{{ $r->kelas }}</td>
                    <td>
                        @if ($r->jekel == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                      <td>{{ $r->angkatan }}</td>
                      <td>{{ $r->nrp}}</td>
                    <td>
                        @if ($r->status == 'in')
                            Masuk
                        @else
                            Keluar
                        @endif
                    </td>

                    <td>
                        @if ($r->piket == 'Y')
                            Ya Piket
                        @else
                            Tidak Piket
                        @endif
                    </td>
                      <td>{{ $r->keterangan}}</td>
                      <td>{{ $r->created_at}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="form-hapus">
            @csrf
            @method('delete')
            <div class="modal-body">
                <p id="tanya"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="download" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" id="form-download">
            @csrf
            <div class="modal-body">
                <p id="tanya-download"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-coreui-dismiss="modal">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('footer')
@include('layouts.res-js')
<script>
$(document).ready( function () {
    $('#table-report').DataTable();
      responsive: true
} );
</script>

<script>
const hapus = document.getElementById('hapus')
hapus.addEventListener('show.coreui.modal', event => {
  const button = event.relatedTarget
  const name = button.getAttribute('data-coreui-name')
  const url = button.getAttribute('data-coreui-url')
  const title = hapus.querySelector('.modal-title')
  const tanya = hapus.querySelector('.modal-body #tanya')
  const formHapus = hapus.querySelector('#form-hapus')

  title.textContent = 'Hapus ' + name 
  tanya.textContent = 'Yakin Akan Menghapus ' + name + ' ?'
  formHapus.action = url
})
</script>

<script>
const download = document.getElementById('download')
download.addEventListener('show.coreui.modal', event => {
  const button = event.relatedTarget
  const name = button.getAttribute('data-coreui-name')
  const url = button.getAttribute('data-coreui-url')
  const title = download.querySelector('.modal-title')
  const tanya = download.querySelector('.modal-body #tanya-download')
  const formDownload = download.querySelector('#form-download')

  title.textContent = 'Mendownload ' + name 
  tanya.textContent = 'Yakin Akan Mendownload File ' + name + ' ?'
  formDownload.action = url
})
</script>
@endsection