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
       $building= Building::get();
       $d=collect();

        foreach($building as $bl){
            $data=collect();
            $data->put('Building Code', $bl->building_code ?? '');
            $data->put('Property Name', $bl->name ?? '');
            $data->put('Bldg No', $bl->building_no?? '');
            $data->put('ST No', $bl->building_code ?? '');
            $data->put('Zone No', $bl->zone_no?? '');
            $data->put('Zone Name', $bl->area?? '');
            $data->put('City Name', $bl->cityDetails->name ?? '');
            $data->put('Ownership No', $bl->ownership_no?? '');
            $data->put('Ownership Type', $bl->ownership_type ?? '');
            $data->put('Pin No', $bl->pincode ?? '');
            $data->put('Location', $bl->location ?? '');
            $d->push($data);




        }
        return $d;
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
