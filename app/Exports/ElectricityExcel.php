<?php

namespace App\Exports;

use App\Models\Electricity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ElectricityExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = collect();
        $d=collect();
        $electricities = Electricity::get();
        foreach($electricities as $e){
            $data->put('unit_ref', $e->unit->unit_ref??'');
            $data->put('zone_name', '');
            $data->put('elec_no', $e->electric_no);
            $data->put('water_no' ,$e->water_no);
            $data->put('customer_no','');
            $data->put('customer_name', $e->name);
            $data->put('Landloard QID', '');
            $data->put('Tenant QID', $e->qid_no);
            $data->put('Tenant Est Card', '');
            $data->put('Reg Mobile', $e->reg_mobile);
            $data->put('email', '');
            $data->put('Average/M', '');
            $data->put('Last Paid Invoice', $e->last_payment);
            $data->put('Amount', $e->bill_amt);
            $data->put('Status', '');
            $data->put('Remark', $e->remark);

            $d->push($data);
        }
        
        return $d;
    }

    public function headings():array
    {
        return [
            'Unit Ref',
            'Zone Name',
            'Elect No',
            'Water no',
            'Customer No',
            'Customer Name',
            'Landloard QID',
            'Tenant QID',
            'Tenant ESt card',
            'Reg Mobile',
            'Email',
            'Average/M',
            'Last Paid Invoice',
            'Amount',
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
