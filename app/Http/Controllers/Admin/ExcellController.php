<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BuildingExport;
use App\Exports\ElectricityExcel;
use App\Exports\TenantExcel;
use App\Exports\TenantStatementExcel;
use App\Exports\UnitExcel;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExcellController extends Controller
{
    public function building_export()
    {
        return Excel::download(new BuildingExport, 'building' . time() . '.xlsx');
    }
    public function unit_export()
    {
        return Excel::download(new UnitExcel, 'Unit' . time() . '.xlsx');
    }
    public function tenant_export()
    {
        return Excel::download(new TenantExcel, 'Tenant' . time() . '.xlsx');
    }
    public function electric_export()
    {
        
        return Excel::download(new ElectricityExcel, 'Electric-' . time() . '.xlsx');
    }
    public function tenant_statement()
    {
        return Excel::download(new TenantStatementExcel, 'tenant-stement' . time() . '.xlsx');
    }
}
