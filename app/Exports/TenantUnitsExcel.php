<?php

namespace App\Exports;

use App\Models\Contract;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class TenantUnitsExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $d = collect();
        $contracts = Contract::get();
       
        foreach ($contracts as $c) {
            $data = collect();
            $data->put('Tenant Code',$c->tenantDetails->tenant_code??'');
            $data->put('QID No',$c->tenantDetails->qid_document??'');
            $data->put('Cr No',$c->tenantDetails->cr_document??'');
            $data->put('Passport',$c->tenantDetails->passport??'');
            $data->put('Tenant Name',$c->tenantDetails->tenant_english_name??'');
            $data->put('Building Name', $c->tenantDetails->buildingDetails->name ?? '');
            $building = $c->tenantDetails->buildingDetails->id;
            $nit_no = $c->tenantDetails->unit_no;
            $units=Unit::where('building_id', $building)->where('unit_no', $nit_no)->pluck('unit_ref');
            for ($i = 0; $i < 18;$i++){
                if(isset($units[$i])){
                    $data->put('Unit Ref ' . $i + 1, $units[$i]);
                }
                else
                {
                    $data->put('Unit Ref ' . $i + 1, '');
                }
                
            }
            $gracet=json_decode($c->grace_period_month);
            if(is_array($gracet) and count($gracet)>0){
                $t=array_sum($gracet);
            }
            $data->put('Grace Period',$c->lease_period_month-$c->cheques->count());
            $data->put('Total Contract Period',$c->lease_period_month);
            $data->put('Total Due Invoice','');
            $data->put('Lease From',$c->lease_start_date);
            $data->put('Lease To',$c->lease_end_date);
            $rev=$c->latest_invoices?$c->latest_invoices->created_at->format('m-d-Y'):'';
            $data->put('Actual Revenue Up to Date',$rev);
            $actual_revenue = 0;
            if ($c->latest_invoices != null and $c->lease_start_date != null) {
                $actual_revenue = Carbon::parse($c->latest_invoices->created_at)->diffInMonths($c->lease_start_date);
            }
            $data->put('Actual Revenue Period',$actual_revenue);
            $data->put('Total Unit Use',$contracts->where('tenant_name', $c->tenant_name)->count());
            $data->put('Rent Amount',$c->rent_amount);
            $data->put('Actual Revenue',$actual_revenue*$c->rent_amount);
            $paid = $c->invoices->where('payment_status', 'Paid')->sum('amt_paid');
            $outstanding = ($actual_revenue * $c->rent_amount) - $paid;
            $data->put('Paid',$paid);
            $data->put('Outstanding',$outstanding);
            $dreferedrevped = $c->cheques->count() - $actual_revenue;
            $data->put('Default Revenue Period',$dreferedrevped);
            $defred = 'QAR '.$dreferedrevped * $c->rent_amount;
            $data->put('Deferred Rvenue',$defred);
            $data->put('Total Cheque',$c->cheques->count()??0);
            $bcheque = $c->cheques->count() - $actual_revenue;
            $data->put('B Cheque',$bcheque);
            $cpdc = $bcheque * $c->rent_amount;
            $data->put('Covered PDC',$cpdc);
            $data->put('Not Cover',$cpdc-($dreferedrevped * $c->rent_amount));
            $data->put('Last Update',$c->updated_at);
            $data->put('Payment Method','');
            $data->put('Security Cheque',$c->cheques->where('cheque_status','Security Cheque')->count()>0?'Available':'Not Available');
            $data->put('Remark',$c->remark);

            $d->push($data);
        }
        return $d;
    }

    public function headings():array
    {
        return [
            'Tenant Code',
            'QID No',
            'Cr No',
            'Passport',
            'Tenant Name',
            'Building Name',
             'Unit Ref 1',
             'Unit Ref 2',
             'Unit Ref 3',
             'Unit Ref 4',
             'Unit Ref 5',
             'Unit Ref 6',
             'Unit Ref 7',
             'Unit Ref 8',
             'Unit Ref 9',
             'Unit Ref 10',
             'Unit Ref 11',
             'Unit Ref 12',
             'Unit Ref 13',
             'Unit Ref 14',
             'Unit Ref 15',
             'Unit Ref 16',
             'Unit Ref 17',
             'Unit Ref 18',
            'Grace Period',
            'Total Contract Period',
            'Total Due Invoice',
            'Lease From',
            'Lease To',
            'Actual Revenue Up to Date',
            'Actual Revenue Period',
            'Total Unit Use',
            'Rent Amount',
            'Actual Revenue',
            'Paid',
            'Outstanding',
            'Default Revenue Period',
            'Default Rvenue',
            'Total Cheque',
            'Bounce .Cheque',
            'Covered PDC',
            'Not Cover',
            'Last Update',
            'Payment Method',
            'Security Cheque',
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
