<?php

namespace App\Exports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class GracePeriodExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $d=collect();
        $graces = Contract::where('is_grace','Yes')->get();
        foreach ($graces as $grace) {
            $data = collect();
            $grace_start_dates = json_decode($grace->grace_start_date);
            $grace_end_dates = json_decode($grace->grace_end_date);
            $grace_period_months = json_decode($grace->grace_period_month);
            $grace_period_days = json_decode($grace->grace_period_day);
            $approveby = $grace->approved_by;
            $remark = $grace->remark;
            if (is_array($grace_start_dates) and count($grace_start_dates) > 0) {
                foreach ($grace_start_dates as $k => $st) {
                    $data->put('Start Date', $st);
                    $data->put('End Date', $grace_end_dates[$k]);
                    $data->put('Grace Month', $grace_period_months[$k]);
                    $data->put('Grace Day', $grace_period_days[$k]);
                    $data->put('Approve By', $approveby ?? 0);
                    $data->put('Remark', $remark);
                    $d->push($data);

                }
            }
            else
            {
                $data->put('Start Date',"");
                $data->put('End Date', "");
                $data->put('Grace Month',"");
                $data->put('Grace Day', "");
                $data->put('Approve By', "");
                $data->put('Remark',"");
                $d->push($data);
            }
        }
        return $d;
    }
    public function headings():array
    {
   
        return [
            'Start Date',
            'End Date',
            'Grace Month',
            'Grace Day',
            'Approved By',
            'remark',
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
