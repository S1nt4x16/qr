<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QrController extends Controller
{
    public function index() 
    {
        $anggota = DB::table('tm_anggota')
            ->select("id", "name", "kelas", "angkatan", "nrp", "jekel")
            ->get();
        return view('qr', ["anggota" => $anggota]);
    }
}
