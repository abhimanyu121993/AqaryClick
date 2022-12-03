<?php

namespace App\Exports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TenantExcel implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tenant::all();
    }
    public function headings():array
    {
       $building= new Tenant;
        return $building->getTableColumns();
    }
    public function styles(Worksheet $sheet)
    {
    return [
       1    => ['font' => ['bold' => true]],
    ];
    }
}
