<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use PDF;

class QrController extends Controller
{
    public function index() 
    {
        $anggota = DB::table('tm_anggota')
            ->select("id", "name", "kelas", "angkatan", "nrp", "jekel")
            ->get();
        return view('qr-generator.qr', ["anggota" => $anggota]);
    }

    public function downloadpdf($id) 
    {

        $anggota1 = DB::table('tm_anggota')
            ->select('id','name', 'angkatan', 'nrp')
            ->where('id', $id)
            ->first();

        $pdf = Pdf::loadView('qr-generator.pdf', ['a' => $anggota1]);
        return $pdf->download($anggota1->name.'.pdf');
        // return view('qr-generator.pdf',['a' => $anggota1]);
    }

    public function create() 
    {
        return view('qr-generator.create-anggota');
    }

    public function store(Request $request)
    {
        $nama = $request->input('name');
        $jenisKelamin = $request->input('jekel');
        $kelas = $request->input('kelas');
        $angkatan = $request->input('angkatan');
        $nrp = $request->input('nrp');

        $idd = DB::table('tm_anggota')
        ->insertGetId([
            'name'=> $nama,
            'jekel'=> $jenisKelamin,
            'kelas'=> $kelas,
            'angkatan'=> $angkatan,
            'nrp'=> $nrp,
            'created_at' => now()
        ]);

        $image = QrCode::format('png')->size(500)->generate($idd);
        Storage::disk('local')->put('public/images/qrcode/'.$idd.'.png',$image);

        return redirect()->route('qr-generator');
          
    }

    public function edit($id)
    {
        $anggota = DB::table('tm_anggota')
            ->select("name", "jekel", "kelas", "angkatan", "nrp")
            ->where('id',$id)
            ->first();
        return view('qr-generator.edit', [
            "ang" => $anggota,
            "id" => $id
        ]);
    }

    public function update(Request $request) 
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $jekel = $request->input('jekel');
        $kelas = $request->input('kelas');
        $angkatan = $request->input('angkatan');
        $nrp = $request->input('nrp');

        DB::table('tm_anggota')
        ->where('id', $id)
        ->update([

            'name' => $name,
            'jekel' => $jekel,
            'kelas' => $kelas,
            'angkatan' => $angkatan,
            'nrp' => $nrp,
            'created_at' => now()

        ]);

        return redirect()->route('qr-generator');
    }
}
