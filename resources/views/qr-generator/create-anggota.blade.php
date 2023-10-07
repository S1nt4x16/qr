@extends('layouts.main')
@section('title')
Welcome To Tambah Anggota
@endsection
@section('breadcrumb')
Tambah Anggota
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Tambah Anggota
        </h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('/create-anggota/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" 
                                name="name" id="exampleInputPassword1" required autofocus>
                        </div>
                        <div class="mb-2">
                                <label for="jenis_kelamin" class="form-label">
                                    Jenis Kelamin
                                </label>
                                <select class="form-select" name="jekel" aria-label="Default select example" required>
                                    <option value="" selected>--Pilih--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kelas</label>
                            <input type="text" class="form-control" 
                                name="kelas" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" 
                                name="angkatan" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">NRP</label>
                            <input type="text" class="form-control" 
                                name="nrp" id="exampleInputPassword1" required>
                        </div>
                        <div>
                            <input type="reset" class="btn btn-md btn-warning">
                            <button type="submit" name="simpan" 
                                class="btn btn-md btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
@endsection
