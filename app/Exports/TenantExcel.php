<?php

namespace App\Exports;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class TenantExcel implements FromCollection,WithHeadings,WithStyles, WithEvents
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
        $d=collect();
        if (Auth::user()->hasRole('superadmin')) {
            $tenants = Tenant::get();
        }
        else
        {
            $tenants = Tenant::where('user_id',$this->user_id)->get();
        }
        foreach($tenants as $tenant){
            $data = collect();
            $data->put('File No',$tenant->file_no);
            $data->put('Tenant Code',$tenant->tenant_code);
            $data->put('Tenant Type',$tenant->tenant_type=='TP'?'Personal':($tenant->tenant_type=='TC'?'Company':($tenant->tenant_type=='TG'?'Government':'')));
            $data->put('Document Type',$tenant->tenant_document??'');
            $data->put('ID. No',$tenant->qid_document??$tenant->cr_document??$tenant->passport??'No Available');
            $data->put('Tenant Name',$tenant->tenant_english_name);
            $data->put('Mobile (Primary)',$tenant->tenant_primary_mobile);
            $data->put('Mobile (Secondary)',$tenant->tenant_secondary_mobile);
            $data->put('Email',$tenant->email);
            $data->put('P.O. Box',$tenant->post_office);
            $data->put('Status',$tenant->status);
            $data->put('legal', $tenant->legals->count());
            $d->push($data);
        }
        return $d;
    }
    public function headings():array
    {
    //    $building= new Tenant;
    //     return $building->getTableColumns();
        return [
            'File No',
            'Tenant Code',
            'Tenant Type',
            'Document Type',
            'ID. No',
            'Tenant Name',
            'Mobile (Primary)',
            'Mobile (Secondary)',
            'Email',
            'P.O. Box',
            'Status',
            'Legal Count'
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
