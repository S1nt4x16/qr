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

        $count = DB::table('absen')
            ->where('id', $id)
            ->count();

        if($piket = 'on') {
            $piketvalue = 'Y'
        } else {
            $piketvalue = 'N'
        }

        if($count = 0) {
            DB::table('absen')
        ->insert([
            'piket' => $piketvalue
            'keterangan' => $keterangan
            'status' => 'in'
            'created_at' => now()
        ]);
        } 
    }

    
}
