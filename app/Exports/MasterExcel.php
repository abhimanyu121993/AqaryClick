<?php

namespace App\Exports;

use App\Models\Building;
use App\Models\Contract;
use App\Models\Electricity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterExcel implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $buildings=Building::select('building_no','name','building_code','zone_no','area','city','ownership_no','ownership_type','pincode','location')->get();
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

       $d1= $buildings->merge($d);


       $data = collect();
       $dc=collect();
       $graces = Contract::where('is_grace','Yes')->get();
      
       foreach ($graces as $grace) {
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
                   $dc->push($data);

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
               $dc->push($data);
           }
       }
       $d2= $d1->merge($dc);
    }
    public function headings():array
    {
    //    $building= new Building;
    //     return $building->getTableColumns();
        return [
            'Building Code',
            'Property Name',
            'Bldg No',
            'Zone No',
            'Zone Name',
            'City Name',
            'Ownership No',
            'Ownership Type',
            'Pin No',
            'Location',
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
            'Start Date',
            'End Date',
            'Grace Month',
            'Grace Day',
            'Approved By',
            'remark',
            
        ];
    }
}
