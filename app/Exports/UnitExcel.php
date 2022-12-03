<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class UnitExcel implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Unit::all();
    }
    public function headings():array
    {
       $building= new Unit;
        return $building->getTableColumns();
    }
    public function styles(Worksheet $sheet)
    {
    return [
       1    => ['font' => ['bold' => true]],
    ];
    }
}
