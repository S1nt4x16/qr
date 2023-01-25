<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() 
    {

        return view('index');
    }

    public function store(Request $request) 
    {    
        $id = $request->input('id');
        $piket = $request->input('piket');
        $keterangan = $request->input('keterangan');

        $find = DB::table('tm_anggota')
            ->where('id', $id)
            ->count();
        
        if(!$find) {
            return redirect()->back()->with('error', 'QR Code Anda Tidak Ditemukan');   
        }

        $count = DB::table('presensi')
            ->where('id_anggota', $id)
            ->count();

        if($piket = 'on') {
            $piketvalue = 'Y';
        } else {
            $piketvalue = 'N';
        }

        if($count == 0) {
        $id_data = DB::table('presensi')
            ->insertGetId([
                'id_anggota' => $id,
                'piket' => $piketvalue,
                'keterangan' => $keterangan,
                'status' => 'in',
                'created_at' => now()
                
            ]);

        $show = DB::table('presensi as a')
            ->join('tm_anggota as b', 'b.id', '=', 'a.id_anggota')
            ->select("b.name", "b.jekel", "b.kelas", "b.angkatan", "b.nrp", "a.status", "a.piket", "a.keterangan")
            ->where('a.id', $id_data)
            ->first();
        }

        if($count == 1) {
        $id_data = DB::table('presensi')
            ->insertGetId([
                'id_anggota' => $id,
                'piket' => $piketvalue,
                'keterangan' => $keterangan,
                'status' => 'out',
                'created_at' => now()
                
            ]);

        $show = DB::table('presensi as a')
            ->join('tm_anggota as b', 'b.id', '=', 'a.id_anggota')
            ->select("b.name", "b.jekel", "b.kelas", "b.angkatan", "b.nrp", "a.status", "a.piket", "a.keterangan")
            ->where('a.id', $id_data)
            ->first();
        }
        
        if($count >= 2) {
            
           return redirect()->back()->with('error', 'GAUSAH ABSEN LAGI LU UDAH ABSEN TADI :)');
        }
        
        if($show->jekel = 'L') {
            $jekelvalue = 'Laki-Laki';
        } else {
            $jekelvalue = 'Perempuan';
        }

        if($show->status == 'in') {
            $statusvalue = 'Masuk';
        } else {
            $statusvalue = 'Keluar';
        }

        return redirect()->back()->with('success', 'Selamat Anda Telah Berhasil Melakukan Presensi'. ' '. $show->name. ' '. 'Anda Telah'. ' ' . $statusvalue);
    }
}
