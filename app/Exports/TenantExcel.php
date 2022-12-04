<?php

namespace App\Exports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TenantExcel implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tenant::select('file_no','tenant_code','qid_document','cr_document','passport','tenant_english_name','tenant_primary_mobile','tenant_secondary_mobile','email','post_office','status')->get();
    }
    public function headings():array
    {
    //    $building= new Tenant;
    //     return $building->getTableColumns();
        return [
            'File No',
            'Tenant Code',
            'Qid No',
            'Cr No',
            'Passport',
            'Tenant Name',
            'Mobile (Primary)',
            'Mobile (Secondary)',
            'Email',
            'P.O. Box',
            'Status'
        ];
    }
    public function styles(Worksheet $sheet)
    {
    return [
       1    => ['font' => ['bold' => true]],
    ];
    }
}
