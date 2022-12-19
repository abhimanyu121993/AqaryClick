<?php

namespace App\Exports;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class ContractExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
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
        $contacts=Contract::get();
        $d = collect();
        
        foreach($contacts as  $contact){
            $data = collect();
            $data->put('1st Party',$contact->tenantDetails->tenant_english_name??'');
            $data->put('2nd party',$contact->lessorDetails->fname??'');
            $data->put('Sponsor',$contact->sponsor_name??'');
            $data->put('Sponsor ID',$contact->sponsor_oid??'');
            $data->put('Mobile No.',$contact->sponsor_mobile??'');
            $data->put('Attestation No.',$contact->attestation_no??'');
            $data->put('Attestation Expiry',$contact->attestation_expiry??'');
            $data->put('Attestation Remaning month','');
            $data->put('1st contract Lease Signing Date',$contact->created_at->format('d-M-Y')??'');
            $releasedate=Carbon::parse($contact->release_date)->format('d-M-Y');
            $data->put('Lease Signed Date',$releasedate??'');
            $lsdate=Carbon::parse($contact->lease_start_date)->format('d-M-Y')??'';
            $data->put('Lease from',$lsdate??'');
            $lto=Carbon::parse($contact->lease_end_date)->format('d-M-Y')??'';
            $data->put('Lease to',$lto??'');
            $data->put('Total contract period',$contact->lease_period_month??'');
            $data->put('Remaning period','');
            $data->put('Discount',$contact->discount??'');
            $data->put('Increment term',$contact->increament_term??'');
            $data->put('Status',$contact->contract_status??'');
            $d->push($data);
        }
        return $d;
    }
    public function headings():array
    {
        return [
            '1st Party',
            '2nd party ',
            'Sponsor',
            'Sponsor ID',
            'Mobile No.',
            'Attestation No.',
            'Attestation Expiry',
            'Attestation Remaning month ',
            '1st contract Lease Signing Date',
            'Lease Signed Date',
            'Lease from',
            'Lease to',
            'Total contract period',
            'Remaning period ',
            'Discount ',
            'Increment term',
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
