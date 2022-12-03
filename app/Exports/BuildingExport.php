<?php

namespace App\Exports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BuildingExport implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Building::all();
    }

    public function headings():array
    {
       $building= new Building;
        return $building->getTableColumns();
    }
    public function styles(Worksheet $sheet)
{
    return [
       1    => ['font' => ['bold' => true]],
    ];
}
}
