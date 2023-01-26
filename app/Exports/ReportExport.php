<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class ReportExport implements FromCollection, WithMapping, WithHeadings, WithStyles, WithColumnWidths
{
    protected $data;
    private $row = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function map($data): array
    {

        if($data->jekel == 'L') {
            $jekelvalue = 'Laki-Laki';
        } else {
            $jekelvalue = 'Perempuan';
        }

        if($data->piket == 'Y') {
            $piketvalue = 'Ya Piket';
        } else {
            $piketvalue = 'Tidak Piket';
        }

        if($data->status == 'in') {
            $statusvalue = 'Masuk';
        } else {
            $statusvalue = 'Keluar';
        }



        return [
            ++$this->row,
            $data->name,
            $data->kelas,
            $jekelvalue,
            $data->angkatan,
            $data->nrp,
            $statusvalue,
            $data->keterangan,
            $piketvalue,
            $data->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            [
                'DATA REPORT PRESENSI',
            ],
            [' '],
            [
                'No',
                'Name',
                'Kelas',
                'Jenis Kelamin',
                'Angkatan',
                'NRP',
                'Status',
                'Keterangan',
                'Piket',
                'Presensi Masuk/Keluar'
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A3:K3')->getFont()->setBold(true);
        $sheet->mergeCells('A1:K1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
    }

    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 40,
            'C' => 15,
            'D' => 20,
            'E' => 12,
            'F' => 15,
            'G' => 15,
            'H' => 80,
            'I' => 15,
            'J' => 30,
        ];
    }
}