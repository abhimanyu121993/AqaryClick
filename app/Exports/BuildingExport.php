<?php

namespace App\Exports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BuildingExport implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Building::select('building_no','name','building_code','street_no','zone_no','area','city','ownership_no','ownership_type','pincode','location')->get();
    }

    public function headings():array
    {
    //    $building= new Building;
    //     return $building->getTableColumns();
        return [
            'Building Code',
            'Property Name',
            'Bldg No',
            'ST No',
            'Zone No',
            'Zone Name',
            'City Name',
            'Ownership No',
            'Ownership Type',
            'Pin No',
            'Location'
        ];
    }
    public function styles(Worksheet $sheet)
{
    return [
       1    => ['font' => ['bold' => true]],
    ];
}

public function registerEvents(): array
{
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:J1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('F4B084');


        },
    ];
}
}
