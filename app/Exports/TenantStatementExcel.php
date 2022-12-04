<?php

namespace App\Exports;

use App\Models\Contract;
use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TenantStatementExcel implements FromCollection,WithHeadings
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
            $gracet=json_decode($c->grace_period_month);
            if(is_array($gracet) and count($gracet)>0){
                $t=array_sum($gracet);
            }
            $data->put('Grace Period',$t??0);
            $data->put('Total Contract Period',$c->lease_period_month);
            $data->put('Total Due Invoice','');
            $data->put('Lease From',$c->lease_start_date);
            $data->put('Lease To',$c->lease_end_date);
            $data->put('Actual Revenue Up to Date',$c->release_date);
            $data->put('Actual Revenue Period','');
            $data->put('Total Unit Use','');
            $data->put('Rent Amount',$c->rent_amount);
            $data->put('Actual Revenue','');
            $data->put('Paid','');
            $data->put('Outstanding','');
            $data->put('Default Revenue Period','');
            $data->put('Default Rvenue','');
            $data->put('Total Cheque',$c->cheques->count()??0);
            $data->put('Bounce Cheque',$c->cheques->where('status','Bounced')->count()??0);
            $data->put('Covered PDC', '');
            $data->put('Not Cover','');
            $data->put('Last Update',$c->updated_at);
            $data->put('Payment Method','');
            $data->put('Security Cheque','');
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
}
