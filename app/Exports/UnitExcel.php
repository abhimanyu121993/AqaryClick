<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class UnitExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Unit::select('unit_ref','revenue','unit_status','unit_type','unit_no','unit_floor','unit_size','actual_rent','remark')->get()->append(['unit_type_name','unit_status_name'])->makeHidden(['unit_status','unit_type']);
    }
    public function headings():array
    {
    //    $building= new Unit;
    //     return $building->getTableColumns();
        return [
            'Unit Ref',
            'Revenue Code',
            'Unit No',
            'Floor',
            'Area/m2',
            'Unit Rental Rate',
            'Remark',
            'Unit Type',
            'Status',
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
