<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BusinessDetail;
use App\Models\Contract;
use App\Models\currency;
use App\Models\Customer;
use App\Models\Grace;
use App\Models\Invoice;
use App\Models\Legal;
use App\Models\Nationality;
use App\Models\PaymentHistory;
use App\Models\Tenant;
use App\Models\TenantPayment;
use App\Models\Unit;
use App\Models\UnitStatus;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Carbon\Carbon;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $unit = UnitStatus::all();
        } else {

            $building = Building::where('user_id', Auth::user()->id)->get();
            $customer = User::find($this->user_id)->customerDetail;
            $tenantStatus = Tenant::where('user_id', $this->user_id)->get();
            $unit = UnitStatus::all();
        }
        return view('admin.settings.report', compact('building', 'tenantStatus', 'customer', 'unit'));
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
            'type' => 'required|in:ccr,lpcr,recc,grace'
        ]);
        $user = Customer::find($req->owner_id)->user;
        if ($req->type == 'ccr') {
            $contracts = Contract::where('user_id', $user->id)->get();
        } else if ($req->type == 'lpcr') {
            $contracts = Contract::where('user_id', $user->id)->where('overdue', '>', 0)->get();
        } else if ($req->type == 'recc') {
            if ($req->year) {
                $contracts = Contract::where([
                    ["user_id", '=', $user->id],
                    [DB::raw("str_to_date(lease_end_date,'%d-%m-%Y')"), '>=', $req->year . '-01-01'],
                    [DB::raw("str_to_date(lease_end_date,'%d-%m-%Y')"), "<=", $req->year . "-12-31"]
                ])->get();
                // dd($contracts);
            } else {
                $contracts = Contract::where('user_id', $user->id)->where('expire', true)->get();
            }
        } else if ($req->type == 'grace') {
            $grace = Grace::where('user_id', $user->id)->get();
            return view('admin.report.grace', compact('grace'));
        }
        if (count($contracts) == 0) {
            return redirect()->back()->with('error', 'No Any Record Related This Customer!.');
        } else {

            $company = BusinessDetail::where('id', $contracts[0]->company_id)->first();
            if ($req->type == 'ccr') {
                return view('admin.settings.report_details', compact('contracts', 'company'));
            } else if ($req->type == 'recc') {
                return view('admin.report.contract_expire', compact('contracts', 'company'));
            } else if ($req->type = 'lpcr') {
                $owner_id = Customer::find($req->owner_id);
                $owner = $owner_id->user->id;
                $contract = Contract::where('user_id', $owner)->get();
                $total_invoice = Invoice::where('user_id', $owner);
                $invoice = Invoice::where('user_id', $owner)->where('payment_status', 'Paid')->get()->count();

                $Allinvoice = Invoice::where('user_id', $owner)->get();
                $invoiceDetails = Invoice::where('user_id', $owner)->where('payment_status', 'Paid')->get();
                $inv_paid_amt = $invoiceDetails->sum('amt_paid');
                $inv_all_due_amt = $invoiceDetails->sum('due_amt');
                $total_amount = Invoice::withSum('Contract', 'rent_amount')->where('user_id', $owner)->get()->sum('contract_sum_rent_amount');
                $not_paid_invoice = Invoice::where('user_id', $owner)->where('payment_status', 'Not Paid')->count();
                $delay_invoice = Invoice::where('user_id', $owner)->whereNotNull('overdue_period')->count() ?? '0';
                $total_delay_amt = Invoice::withSum('Contract', 'rent_amount')->where('user_id', $owner)->whereNotNull('overdue_period')->get()->sum('contract_sum_rent_amount');
                $invoice_not_paid_amt = Invoice::withSum('Contract', 'rent_amount')->where('user_id', $owner)->where('payment_status', 'Not Paid')->get()->sum('contract_sum_rent_amount');
                $total_amt = $invoice * $total_amount;
                $total_delay = $delay_invoice * $total_delay_amt;
                $invoice_balance = $total_delay + $not_paid_invoice;
                $outstanding = $invoice_balance - $inv_paid_amt;
                $total_balance = $total_delay + ($not_paid_invoice * $invoice_not_paid_amt);
                return view('admin.report.contract_overdue', compact('contracts', 'company', 'contract', 'invoiceDetails', 'total_amt', 'total_delay', 'invoice_balance', 'total_balance', 'invoice', 'delay_invoice', 'not_paid_invoice', 'invoice_not_paid_amt', 'inv_paid_amt', 'outstanding', 'Allinvoice', 'inv_all_due_amt'));
            }

            // $pdf = Pdf::loadView('admin.settings.report.contract_expire',compact('contracts','company'));
            // return $pdf->stream('report.pdf');
        }
    }

    public function buildingReport(Request $req)
    {
        $req->validate([
            'owner_id' => 'required|numeric',
            // 'type' => 'required|in:a,na'
        ]);
        $user = Customer::find($req->owner_id)->User->id;


        // if ($req->type == 'a') {
        //     $buildings = Building::where('user_id', $user)->where('status', 'active')->get();
        // } else if ($req->type == 'na') {
        //     $buildings = Building::where('user_id', $user)->where('status', 'inactive')->orWhereNull('status')->get();
        // }
       
        
        if ($req->type == 'a') {
            $buildings = Building::where('user_id', $user)->where('status', 'active')->get();
        } else if ($req->type == 'na') {
            $buildings = Building::where('user_id', $user)->where('status', 'inactive')->orWhereNull('status')->get();
        }
        // return view('admin.report.building', compact('buildings'));
        $buildings = Building::where('user_id', $user)->get();
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
                return $query->whereDate('created_at', '>=', $data['from'])->whereDate('created_at', '<=', $data['to']);
            }
        ])->where('tenant_id', $req->tenant_id)->get();
        if (count($res) < 1) {
            return redirect()->back()->with('error', 'There is no any Payment History in Your Panel!.');
        } else {
            $tenant = $res[0]->tenant;
            $date = carbon::parse($req->from)->format('d-M-Y') . ' To ' . carbon::parse($req->to)->format('d-M-Y');
            $company = BusinessDetail::where('id', $res[0]->contract->company_id)->first();
            return view('admin.settings.report_tenant_statement', compact('res', 'company', 'tenant', 'date'));
            $pdf = Pdf::loadView('admin.settings.report_tenant_statement', compact('res', 'company', 'tenant', 'date'))->setPaper('a4', 'landscape');
            return $pdf->stream('Tenants Statement.pdf');
        }
    }

    public function statementReportAllTenant(Request $req)
    {
        $this->getUser();
        $req->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date'
        ]);

        if (Auth::user()->hasRole('superadmin')) {
            if ($req->building_id == 'all') {
                $tenants = Tenant::where('building_name', $req->building_id)->pluck('id');
            } else {
                $tenants = Tenant::pluck('id');
            }
        } else {
            if ($req->building_id == 'all') {
                $tenants = Tenant::where('user_id', $this->user_id)->pluck('id');
            } else {
                $tenants = Tenant::where('user_id', $this->user_id)->where('building_name', $req->building_id)->pluck('id');
            }
        }

        $statement = PaymentHistory::with([
            'tenantPayment' => function ($query) use ($tenants) {
                return $query->whereIn('tenant_id', $tenants);
            }
        ])->whereDate('created_at', '>=', Carbon::parse($req->date_from))->where('created_at', '<=', Carbon::parse($req->date_to))->get();
        if (count($statement) < 1) {
            return redirect()->back()->with('error', 'There is no any Payment History in Your Panel!.');
        } else {
            $date = carbon::parse($req->date_from)->format('d-M-Y') . ' To ' . carbon::parse($req->date_to)->format('d-M-Y');

            // return $statement;
            return view('admin.report.all_tenant_statement', compact('statement', 'date'));
            $pdf = Pdf::loadView('admin.report.all_tenant_statement', compact('statement', 'date'))->setPaper('a4', 'landscape');
            return $pdf->stream('All Tenants Statement.pdf');
        }
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

    public function OverdueReort(Request $req)
    {
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
                'Units' => function ($query) use ($i, $req) {
                    return $query->with('alloted')->whereDate('created_at', '<=', Carbon::parse('31' . '-' . $i . '-' . $req->year));
                }
            ])->find($req->building_id);
            $janUnitIds = $Janunit->Units->pluck('alloted')->pluck('id')->toArray();
            $tenantsid = array_values(array_filter($janUnitIds, fn ($value) => !is_null($value) && $value !== ''));
            $invoiceamt = Invoice::whereDate('invoice_period_start', '>=', Carbon::parse('01' . '-' . $i . '-' . $req->year))->whereDate('invoice_period_end', '<=', Carbon::parse('31' . '-' . $i . '-' . $req->year))->whereIn('tenant_id', $tenantsid)->sum('amt_paid');
            // return $invoiceamt;
            $data['revenue'][$i] = ([
                'totalunit' => $Janunit->Units->count(),
                'act_exp_rev' => $Janunit->Units->sum('actual_rent_num'),
                'rev_date' => Carbon::parse('1' . '-' . $i . '-' . $req->year)->format('M-Y'),
                'act_col_rev' => $invoiceamt,
                'legal' =>
                $Janunit->Units->where('unit_status', UnitStatus::where('name', 'legal process')->first()->id)->count(),
                'vacant' => $Janunit->Units->where('unit_status', UnitStatus::where('name', 'vacant')->first()->id)->count()
            ]);
        }
        return view('admin.report.building_revenue', compact('data'));
    }

    public function unitReport(Request $req)
    {
        $user = Customer::find($req->owner_id)->user;
        $type = $req->unit_status;
        if ($type=='court') {
            $unit = Legal::where('user_id', $user->id)->where('status', 'In the Court')->get();
        } else if ($type =='legal process') {
            $unit = Legal::where('user_id', $user->id)->get();
        } 
        else {
            if ($req->unit_status == 'all') {
                $unit = Unit::where('user_id', $user->id)->get();
            } else {
                $usi = UnitStatus::where('name', $req->unit_status)->first();
                $unit = Unit::where('user_id', $user->id)->where('unit_status', $usi->id)->get();
            }
        }
        return view('admin.report.unit', compact('unit', 'type'));
    }
}
