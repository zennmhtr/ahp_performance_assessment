<?php

namespace App\Imports;

use App\Models\Kriteria;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KriteriaImport implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        $lastKode = Kriteria::orderBy('kode', 'desc')->first();
        if ($lastKode) {
        // Ambil angka dari kode terakhir setelah "ATL"
        $lastNumber = (int) substr($lastKode->kode, 3); 
        $kode = "ATL" . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT); 
    } else {
        $kode = "ATL01";
    }
        return new Kriteria([
            'kode' => $kode,
            'nama' => $row['kriteria'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
