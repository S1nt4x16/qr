<?php

namespace App\Http\Controllers;

use App\exel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index() 
    {
        $report = DB::table('presensi as a')
        ->join('tm_anggota as b', 'a.id_anggota', '=', 'b.id')
        ->select('a.id', 'a.status', 'a.keterangan', 'a.piket', 'b.name', 'a.created_at', 'b.kelas', 'b.angkatan', 'b.nrp', 'b.jekel')
        ->get();

        return view('admin.report', ["report" => $report]);
    }

    public function excelexport() 
    {
        $data = DB::table('presensi as a')
        ->join('tm_anggota as b', 'a.id_anggota', '=', 'b.id')
        ->select('a.status', 'a.keterangan', 'a.piket', 'b.name', 'a.created_at', 'b.kelas', 'b.angkatan', 'b.nrp', 'b.jekel')
        ->get();

        return Excel::download(new ReportExport($data), 'ReportPresensi.xlsx');
    }

    public function delete() 
    {
        DB::table('presensi')->truncate();

        return redirect()->route('report');
    }
}
