<?php

namespace App\Exports;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class UnitExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    protected $user_id = '';
    public function getUser()
    {
           if(Auth::user()->hasRole('Owner')){
              $this->user_id = Auth::user()->id;
          }
          else
          {
              $this->user_id = Auth::user()->created_by;
          }
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $this->getUser();
        $d = collect();
        if (Auth::user()->hasRole('superadmin')) {
            $units = Unit::select('unit_ref', 'revenue', 'unit_status', 'building_id', 'unit_type', 'unit_no', 'unit_floor', 'unit_size', 'actual_rent', 'remark')->get()->append(['unit_type_name', 'unit_status_name', 'buildingDetails'])->makeHidden(['unit_status', 'unit_type']);
        }
        else
        {
            $units = Unit::select('unit_ref', 'revenue', 'unit_status', 'building_id', 'unit_type', 'unit_no', 'unit_floor', 'unit_size', 'actual_rent', 'remark')->where('user_id',$this->user_id)->get()->append(['unit_type_name', 'unit_status_name', 'buildingDetails'])->makeHidden(['unit_status', 'unit_type']);
        }
        foreach($units as $unit){
            $data = collect();
            $data->put('Building name', $unit->buildingDetails->name??'');
            $data->put('Unit Ref', $unit->unit_ref);
            $data->put('Revenue Code',$unit->revenue);
            $data->put('Unit Type',$unit->unit_type_name);
            $data->put('Unit No',$unit->unit_no);
            $data->put('Floor',$unit->unit_floor);
            $data->put('Area/m2',$unit->unit_size);
            $data->put('Unit Rental Rate',$unit->actual_rent);
            $data->put('Status',$unit->unit_status_name);
            $data->put('Remark',$unit->remark);
            $d->push($data);
            
        }
        return $d;
    }
    public function headings():array
    {
    //    $building= new Unit;
    //     return $building->getTableColumns();
        return [
            'Building Name',
            'Unit Ref',
            'Revenue Code',
            'Unit Type',
            'Unit No',
            'Floor',
            'Area/m2',
            'Unit Rental Rate',
            'Status',
            'Remark',
           
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
