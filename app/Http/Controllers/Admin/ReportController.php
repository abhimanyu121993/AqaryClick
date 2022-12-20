<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentHistory;
use App\Models\Tenant;
use App\Models\TenantPayment;
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
            $tenantStatus = Tenant::where('user_id', Auth::user()->id)->get();
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
        $pdf = Pdf::loadView('admin.settings.report_details',compact('contracts'));
        return $pdf->stream('report.pdf');
    }

    public function buildingReport(Request $req)
    {
        $req->validate([
            'owner_id' => 'required|numeric',
            'type' => 'required|in:a,na'
        ]);

        if ($req->type == 'a') {
            $buildings = Building::where('user_id', $req->owner_id)->where('status', 'active')->get();
        } else if ($req->type == 'na') {
            $buildings = Building::where('user_id', $req->owner_id)->where('status', 'inactive')->get();
        }
        return $buildings;
    }

    public function statementReport(Request $req)
    {
        $req->validate([
            'from' => 'required|date',
            'end' => 'required|date',
            'tenant_id' => 'required|numeric'
        ]);
        $data = $req->all();
        $res = TenantPayment::with([
            'payHistory' => function ($query) use ($data) {
                return $query->whereDateBetween('cteated_at', $data['from'], $data['to']);
            }
        ])->where('tenant_id', $req->tenant_id)->get();

        return $res;
    }


    public function MonthlyReport(Request $req)
    {
        $this->getUser();
        $req->validate([
            'start_date'=>'required|date',
            'end_date'=>'required|date'
        ]);
        
        if(Auth::user()->hasRole('superadmin')){
            $tenants = Tenant::pluck('id');
        }
        else
        {
            $tenants = Tenant::where('user_id', $this->user_id)->pluck('id');
        }
        $statement = PaymentHistory::with([
            'tenantPayment' => function ($query) use($tenants) {
                return $query->whereIn('tenant_id', $tenants);
            }
        ])->whereDateBetwwen('created_at',Carbon::parse($req->start_date),Carbon::parse($req->end_date))->latest();

        return $statement;
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
}
