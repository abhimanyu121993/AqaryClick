<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BusinessDetail;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentHistory;
use App\Models\Tenant;
use App\Models\TenantPayment;
use App\Models\UnitStatus;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    protected $user_id = '';
    public function getUser()
    {
        if (Auth::user()->hasRole('Owner')) {
            $this->user_id = Auth::user()->id;
        } else {
            $this->user_id = Auth::user()->created_by;
        }
    }


    public function report()
    {
        $this->getUser();
        $role = Auth::user()->roles[0]->name;
        if ($role == 'superadmin') {
            $building = Building::all();
            $customer = Customer::all();
            $tenantStatus = Tenant::all();
        } else {

            $building = Building::where('user_id', Auth::user()->id)->get();
            $customer = User::find($this->user_id)->customerDetail;
            $tenantStatus = Tenant::where('user_id', $this->user_id)->get();
        }
        return view('admin.settings.report', compact('building', 'tenantStatus', 'customer'));
    }

    public function tenantUnitBuilding($building_id)
    {
        if ($building_id == 'all') {
            $role = Auth::user()->roles[0]->name;
            if ($role == 'superadmin') {
                $res = Tenant::with('unittypeinfo')->get();
            } else {
                $res = Tenant::with('unittypeinfo')->where('user_id', Auth::user()->id)->get();
            }
        } else {
            $role = Auth::user()->roles[0]->name;
            if ($role == 'superadmin') {
                $res = Tenant::with('unittypeinfo')->where('building_name', $building_id)->get();
            } else {
                $res = Tenant::with('unittypeinfo')->where('user_id', Auth::user()->id)->where('building_name', $building_id)->get();
            }
        }
        $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '(';
            $html .= $r->unittypeinfo->name ?? '';
            $html .= ')' . '</option>';
        }
        return response()->json($html);
    }
    public function getFileDownload($path)
    {
        $filePath = public_path('upload/tenent/' . $path);
        return Response::download($filePath);
    }

    public function masterReport($tenant_id)
    {
        $tenant = Tenant::find($tenant_id);
        $contract = Contract::where('tenant_name', $tenant_id)->get();
        $invoice = Invoice::where('tenant_id', $tenant_id)->get();

        return view('admin.settings.master_report', compact('tenant', 'contract', 'invoice'));
    }

    public function contractReport(Request $req)
    {
        $req->validate([
            'owner_id' => 'required|numeric',
            'type' => 'required|in:ccr,lpcr,recc'
        ]);
        $user = Customer::find($req->owner_id)->user;
        if ($req->type == 'ccr') {
            $contracts = Contract::where('user_id', $user->id)->get();
        } else if ($req->type == 'lpcr') {
            $contracts = Contract::where('user_id', $user->id)->where('overdue', '>', 0)->get();
        } else if ($req->type == 'recc') {
            $contracts = Contract::where('user_id', $user->id)->where('expire', true)->get();
        }
if(count($contracts)==0){
    return redirect()->back()->with('error', 'No Records Found!.');
}
else{

        $company = BusinessDetail::where('id', $contracts[0]->company_id)->first();
        if($req->type== 'ccr'){
            return view('admin.settings.report_details',compact('contracts','company'));

        }
        else if($req->type=='recc'){
            return view('admin.report.contract_expire',compact('contracts','company'));

        }
        else if($req->type='lpcr'){
            return view('admin.report.contract_overdue',compact('contracts','company'));

        }
        
        // $pdf = Pdf::loadView('admin.settings.report.contract_expire',compact('contracts','company'));
        // return $pdf->stream('report.pdf');
    }}

    public function buildingReport(Request $req)
    {
        $req->validate([
            'owner_id' => 'required|numeric',
            'type' => 'required|in:a,na'
        ]);
        $user = Customer::find($req->owner_id)->User->id;
       
        
        if ($req->type == 'a') {
            $buildings = Building::where('user_id', $user)->where('status', 'active')->get();
        } else if ($req->type == 'na') {
            $buildings = Building::where('user_id', $user)->where('status', 'inactive')->orWhereNull('status')->get();
        }
        // return view('admin.report.building', compact('buildings'));
        $pdf=Pdf::loadView('admin.report.building',compact('buildings'))->setPaper('a4', 'landscape');;
        return $pdf->stream('building.pdf');
    }

    public function statementReport(Request $req)
    {
        $req->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'tenant_id' => 'required|numeric'
        ]);
        $data = $req->all();
        $res = TenantPayment::with('contract')->with([
            'payHistory' => function ($query) use ($data) {
                return $query->whereDate('created_at','>=', $data['from'])->whereDate('created_at','<=',$data['to']);
            }
        ])->where('tenant_id', $req->tenant_id)->get();
        $tenant=$res[0]->tenant;
        $date=carbon::parse($req->from)->format('d-M-Y').' To '.carbon::parse($req->to)->format('d-M-Y');
        if(count($res)==0){
            return redirect()->back()->with('error', 'No Records Found!.');
        }
        else{
                $company = BusinessDetail::where('id', $res[0]->contract->company_id)->first();
              return view('admin.settings.report_tenant_statement',compact('res','company','tenant','date'));
              $pdf=Pdf::loadView('admin.settings.report_tenant_statement',compact('res','company','tenant','date'))->setPaper('a4', 'landscape');
              return $pdf->stream('Tenants Statement.pdf');
    }
    }

    public function statementReportAllTenant(Request $req)
    {
        $this->getUser();
        $req->validate([
            'date_from'=>'required|date',
            'date_to'=>'required|date'
        ]);
        
        
        if(Auth::user()->hasRole('superadmin')){
            $tenants = Tenant::pluck('id');
        }
        else
        {
            $tenants = Tenant::where('user_id', $this->user_id)->pluck('id');
        }
        $statement = PaymentHistory::with(['tenantPayment' => function ($query) use($tenants) {
                return $query->whereIn('tenant_id', $tenants);
            }
        ])->whereDate('created_at','>=',Carbon::parse($req->date_from))->where('created_at','<=',Carbon::parse($req->date_to))->get();
        $date=carbon::parse($req->date_from)->format('d-M-Y').' To '.carbon::parse($req->date_to)->format('d-M-Y');

        // return $statement;
        return view('admin.report.all_tenant_statement',compact('statement','date'));
        $pdf=Pdf::loadView('admin.report.all_tenant_statement',compact('statement','date'))->setPaper('a4', 'landscape');
              return $pdf->stream('All Tenants Statement.pdf');
    }
    public function newReport()
    {
        $tenantStatus = Tenant::all();
        $role = Auth::user()->roles[0]->name;
        if ($role == 'superadmin') {
            $building = Building::all();
        } else {
            $building = Building::where('user_id', Auth::user()->id)->get();
        }
        return view('admin.settings.new_report', compact('building', 'tenantStatus'));
    }

    public function buildingRevenueReport(Request $req)
    {
        $req->validate([
            'building_id' => 'required',
            'year' => 'required',
        ]);
        $data = [];
        $data['building'] = Building::find($req->building_id);
        $data['revenue'] = [];
        for ($i = 1; $i <= 12; $i++) {
            $Janunit = Building::with([
                'Units' => function ($query) use($i,$req) {
                    return $query->with('alloted')->whereDate('created_at','<=',Carbon::parse('31'.'-'.$i.'-'.$req->year));
                }
            ])->find($req->building_id);
            $janUnitIds = $Janunit->Units->pluck('alloted')->pluck('id')->toArray();
            $tenantsid = array_values(array_filter($janUnitIds, fn($value) => !is_null($value) && $value !== ''));
            $invoiceamt = Invoice::whereDate('invoice_period_start','>=',Carbon::parse('01'.'-'.$i.'-'.$req->year))->whereDate('invoice_period_end','<=',Carbon::parse('31'.'-'.$i.'-'.$req->year))->whereIn('tenant_id', $tenantsid)->sum('amt_paid');
            // return $invoiceamt;
            $data['revenue'][$i] = ([
                'totalunit' => $Janunit->Units->count(),
                'act_exp_rev' => $Janunit->Units->sum('actual_rent_num'),
                'rev_date' => Carbon::parse('1'.'-'.$i.'-' .$req->year)->format('M-Y'),
                'act_col_rev' => $invoiceamt,
                'legal' =>
                $Janunit->Units->where('unit_status', UnitStatus::where('name', 'legal process')->first()->id)->count(),
                'vacant' => $Janunit->Units->where('unit_status', UnitStatus::where('name', 'vacant')->first()->id)->count()
            ]);
        }
        return view('admin.report.building_revenue',compact('data'));
    }
}
