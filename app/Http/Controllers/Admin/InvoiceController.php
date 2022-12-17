<?php

namespace App\Http\Controllers\admin;

use AmrShawky\Currency as AmrShawkyCurrency;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Building;
use App\Models\BusinessDetail;
use App\Models\Cheque;
use App\Models\Contract;
use App\Models\currency;
use App\Models\Customer;
use App\Models\Error;
use App\Models\Invoice;
use App\Models\Tenant;
use Carbon\Carbon;
use AmrShawky\LaravelCurrency\Facade\Currency as amcurrency;
use App\Mail\InvoiceClickMail;
use App\Mail\InvoiceMail;
use App\Models\Nationality;
use App\Models\Unit;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;


class InvoiceController extends Controller
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
    public function index()
    {
        $this->getUser();
        if(Auth::user()->hasRole('superadmin')){
            $a = invoice::pluck('contract_id');
            $tenantDetails = Tenant::get();
            $building = Building::get();
        } else {
            $a = invoice::where('user_id', $this->user_id)->pluck('contract_id');
            $tenantDetails = Tenant::where('user_id', $this->user_id)->get();
            $building = Building::where('user_id', $this->user_id)->get();
        }
        $bank = Bank::all();
        $currency = currency::where('status', 1)->get();
        return view('admin.invoice.add_invoice', compact('tenantDetails', 'building', 'bank', 'currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $invoice = Invoice::all();
        } else {
            $invoice = Invoice::where('user_id', $this->user_id)->get();
        }
        return view('admin.invoice.show_invoice', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getUser();
        $request->validate([
            'tenant_name' => 'required',
            'contract' => 'required',
            'currency_type' => 'required',

        ]);
        $otherpic = [];
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $name = 'Inv-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
                $file->move(public_path('upload/invoice_doc'), $name);
                $otherpic[] = $name;
            }
        }
        $otherpic2 = [];
        if ($request->hasFile('tenant_attachment')) {
            foreach ($request->file('tenant_attachment') as $file) {
                $name = $request->invoice_no . '-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
                $file->move(public_path('upload/invoice_doc/tenant_attachment'), $name);
                $otherpic2[] = $name;
            }
        }
        (float)$amt_paid = $request->amt_paid;
        $overdue = (int) filter_var($request->overdue_period, FILTER_SANITIZE_NUMBER_INT);
        $qar_amt = amcurrency::convert()->from($request->currency_type)->to('QAR')->amount((float)$request->amt_paid ?? 0)->get();
        $data = Contract::where('id', $request->contract)->first();
        if ($request->istax == 1) {
            $per = $data->countryDetails->percentage;
            $tax_amt = ($qar_amt * $per) / 100;
        } else {
            $per = 0;
            $tax_amt = 0;
        }
        $rent_amt = $data->rent_amount;
        dd($rent_amt);
        $inv_due = Invoice::where('contract_id', $request->contract_id)->latest()->first()->due_amt ?? 0;
        $totle_balance = $inv_due + $rent_amt + $tax_amt;
        $due_amt = (float)($totle_balance - $qar_amt);
        $totle_amt = $qar_amt + $due_amt;
        $receipt_count = Invoice::where('user_id', $this->user_id)->where('tenant_id', $request->tenant_name)->count() ?? 0;
        $receipt = str_pad($receipt_count + 1, 3, '0', STR_PAD_LEFT);
        $invoice_no = Invoice::where('user_id', $this->user_id)->where('tenant_id', $request->tenant_name)->count() ?? 0;
        $invoice_no = 'INV' . '-' . Carbon::now()->day . Carbon::now()->month . Carbon::now()->format('y') . '-' . str_pad($invoice_no + 1, 3, '0', STR_PAD_LEFT);
        $data = Invoice::create([
            'user_id' => $this->user_id,
            'tenant_id' => $request->tenant_name,
            'contract_id' => $request->contract,
            'invoice_no' => $invoice_no,
            'receipt_no' => $receipt,
            'due_date' => $request->due_date,
            'invoice_period_start' => $request->invoice_period_start,
            'invoice_period_end' => $request->invoice_period_end,
            'amt_paid' => $qar_amt,
            'user_amt' => $request->amt_paid ?? 0,
            'tax_amt' => $tax_amt ?? 0,
            'tax_per' => $per ?? 0,
            'total_amt' => $totle_amt ?? 0,
            'currency_type' => $request->currency_type,
            'due_amt' => $due_amt,
            'payment_method' => $request->payment_method,
            'tenant_account' => $request->tenant_account,
            'tenant_bank' => $request->tenant_bank,
            'tenant_sender' => $request->tenant_sender,
            'tenant_attachment' => json_encode($otherpic2),
            'tax_no' => $request->tax_no,
            'benifitary_account' => $request->benifitary_account,
            'benifitary_bank' => $request->benifitary_bank,
            'benifitary_name' => $request->benifitary_name,
            'payment_status' => $request->payment_status,
            'overdue_period' => $overdue,
            'remark' => $request->remark,
            'attachment' => json_encode($otherpic),
        ]);
        for ($i = 0; $i < count($request->cheque_no); $i++) {
            if ($request->cheque_no[$i] != null) {
                $mainpic = [];
                if ($request->hasFile('file')) {
                    foreach ($request->file('file') as $file) {
                        $name = $request->invoice_no . '-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
                        $file->move(public_path('upload/cheque_doc/file'), $name);
                        $mainpic[] = $name;
                    }
                }
                $res = Cheque::create(['user_id' => $this->user_id, 'invoice_no' => $invoice_no, 'tenant_id' => $request->tenant_name, 'contract_id' => $request->contract, 'currency' => $request->currency[$i] ?? '', 'qar_amt' => $request->sar_amt[$i] ?? '', 'deposite_date' => $request->deposite_date[$i] ?? '', 'user_amt' => $request->cheque_amt[$i] ?? '', 'cheque_no' => $request->cheque_no[$i] ?? '', 'bank_name' => $request->cheque_bank_name[$i] ?? '', 'cheque_status' => $request->cheque_status[$i] ?? '', 'attachment' => $mainpic[$i] ?? '', 'remark' => $request->cheque_remark[$i] ?? '']);
            }
        }
        if ($data) {
            Mail::to($data->TenantName->email)->send(new InvoiceClickMail($data));
            return redirect(url('admin/invoice-print', $invoice_no))->with('success', 'Invoice has been created successfully.');
        } else {
            return redirect()->back()->with('error', 'Invoice not created.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function contractDetails($tenant_id)
    {
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $res = Contract::where('tenant_name', $tenant_id)->get();
        } else {
            $res = Contract::where('user_id', $this->user_id)->where('tenant_name', $tenant_id)->get();
        }
        $html = ' <option value="" selected hidden disabled>--Select Contract--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->contract_code . ' (';
            $html .= isset($r->tenantDetails->buildingDetails) ? $r->tenantDetails->buildingDetails->name : 'No Bilding Found';
            $html .= ')' . '</option>';
        }
        return response()->json($html);
    }
    public function tenantBuilding($building_id)
    {        $this->getUser();
        if ($building_id == 'all') {
            if (Auth::user()->hasRole('superadmin')) {
                $res = Tenant::all();
            } else {
                $res = Tenant::where('user_id', $this->user_id)->get();
            }
            $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
            }
        } else
         { 
            if (Auth::user()->hasRole('superadmin')) {
                $res = Tenant::where('building_name', $building_id)->get();
            } else {
                $res = Tenant::where('user_id', $this->user_id)->where('building_name', $building_id)->get();
            }
            $html = ' <option value=""selected hidden disabled>--Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
            }
        }
        return response()->json($html);
    }
    public function invoiceDetails($contract_id)
    {
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $res = Contract::with('countryDetails')->with('TenantDetails')->where('id', $contract_id)->first();
        } else {
            $res = Contract::with('countryDetails')->with('TenantDetails')->where('user_id', $this->user_id)->where('id', $contract_id)->first();
        }
        $country_code = $res->countryDetails->currency_code;
        $percent = $res->countryDetails->percentage ?? 0;
        $inv = invoice::where('contract_id', $contract_id)->latest()->first();
        $invoicedate = strtotime($inv->invoice_period_end ?? 0);
        $leaseEnddate = strtotime($res->lease_end_date);
        if ($invoicedate > $leaseEnddate) {
            $res = invoice::where('contract_id', $contract_id)->latest()->first();

            if ($res->due_amt == 0) {
                $msg = "Sorry! This Contract has been Expired.";
                $invoiceEnd = '';
                $invoiceStart = '';
                $payable = '';
                $due_amt = '';
                $rent_amt = '';
                $lastmonth = '';
                $per = $percent;
            } else {
                $msg = "Sorry! This is last invoice for this contract .Pay Your Due Amount";
                $invoiceEnd = $res->invoice_period_end ?? '';
                $invoiceStart = $res->invoice_period_start ?? '';
                $qar_amt = amcurrency::convert()->from('QAR')->to($country_code)->amount((float)$res->due_amt)->get();
                $payable = round($qar_amt ?? '', 2);
                $due_amt = round($qar_amt ?? '', 2);
                $rent_amt = 'No Rent Amount';
                $lastmonth = $res->invoice_period_end;
                $per = $percent;
            }
        } else {
            $invoice = $inv->invoice_period_end ?? null;
            if ($invoice == !null) {
                $invoiceStart = $invoice;
                $invoiceEnd = Carbon::parse($invoice)->addMonth(1)->addDay(-1)->format('d-m-Y');
                $msg = '';
                $lastmonth = Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('d-m-Y');
                $qar_amt = amcurrency::convert()->from('QAR')->to($country_code)->amount((float)$inv->due_amt)->get();
                $due_amt = round($qar_amt, 2);
                $rent_amt = amcurrency::convert()->from('QAR')->to($country_code)->amount((float)($res->rent_amount ?? 0))->get();
                $payable = $country_code . round(($rent_amt + $due_amt), 2);
                $rent_amt = $country_code . round(($rent_amt), 2);
                $per = $percent;
            } else {
                $invoiceStart = $res->lease_start_date;
                $invoiceEnd = Carbon::parse($res->lease_start_date)->addMonth(1)->addDay(-1)->format('d-m-Y');
                $lastmonth = Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('d-m-Y');
                $qar_amt = amcurrency::convert()->from('QAR')->to($country_code)->amount((float)($inv->due_amt ?? 0))->get();
                $msg = '';
                $due_amt = round($qar_amt ?? 0, 2);
                $rent_amt = amcurrency::convert()->from('QAR')->to($country_code)->amount((float)($res->rent_amount ?? 0))->get();
                $per = $percent;

                $payable = $country_code . round(($rent_amt + $due_amt), 2);
                $rent_amt = $country_code . round(($rent_amt), 2);
            }
        }
        if (Carbon::parse(Carbon::now()) < Carbon::parse($invoiceEnd)->format('Y-m-d')) {
            $overdue = "No Due ";
        } else {
            $overdue = Carbon::parse(Carbon::now())->diffInDays(Carbon::parse($invoiceEnd)->format('Y-m-d'));
        }

        return response()->json(array('res' => $res, 'invoiceEnd' => $invoiceEnd, 'invoiceStart' => $invoiceStart, 'msg' => $msg, 'payable' => $payable, 'due_amt' => $due_amt, 'rent_amt' => $rent_amt, 'lastmonth' => $lastmonth, 'overdue' => $overdue, 'per' => $per));
    }

    public function printInvoice($invoice_no)
    {

        $invoice = Invoice::with('customerDetails')->with('TenantName')->where('invoice_no', $invoice_no)->first();
        $country = $invoice->TenantName->tenant_nationality;
        $symbol = Nationality::where('id', $country)->first()->currency_code ?? 'QAR';
        $due_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->due_amt ?? 0))->get();
        $amt_paid = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->amt_paid ?? 0))->get();
        $total_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->total_amt ?? 0))->get();
        $tax_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->tax_amt ?? 0))->get();
        $lessor = Customer::where('id', $invoice->customerDetails->lessor)->first();
        $unit_ref = Unit::where('building_id', $invoice->TenantName->building_name)->where('unit_type', $invoice->TenantName->unit_type)->first();
        $cheque = Cheque::where('invoice_no', $invoice_no)->get();
        $company = BusinessDetail::where('id', $invoice->customerDetails->company_id)->first();
        Mail::to($invoice->TenantName->email)->send(new InvoiceMail($invoice, $lessor, $company, $symbol, $cheque, $unit_ref, $due_amt, $amt_paid, $total_amt, $tax_amt));

        return view('admin.invoice.invoice_details', compact('invoice', 'lessor', 'company', 'symbol', 'cheque', 'unit_ref', 'due_amt', 'amt_paid', 'total_amt', 'tax_amt'));
    }
  
    public function receiptVouchure($invoice_no)
    {
        $invoice = Invoice::with('customerDetails')->with('TenantName')->where('invoice_no', $invoice_no)->first();
        $country = $invoice->TenantName->tenant_nationality;
        $symbol = Nationality::where('id', $country)->first()->currency_code;
        $due_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->due_amt ?? 0))->get();
        $amt_paid = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->amt_paid ?? 0))->get();
        $total_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->total_amt ?? 0))->get();
        $tax_amt = amcurrency::convert()->from('QAR')->to($symbol)->amount((float)($invoice->tax_amt ?? 0))->get();
        $lessor = Customer::where('id', $invoice->customerDetails->lessor)->first();
        $cheque = Cheque::where('invoice_no', $invoice_no)->first();
        $unit_ref = Unit::where('building_id', $invoice->TenantName->building_name)->where('unit_type', $invoice->TenantName->unit_type)->first();
        $cheque = Cheque::where('invoice_no', $invoice_no)->get();
        $company = BusinessDetail::where('id', $invoice->customerDetails->company_id)->first();
        return view('admin.invoice.receipt_vouchar', compact('invoice', 'lessor', 'company', 'symbol', 'cheque', 'unit_ref', 'cheque', 'due_amt', 'amt_paid', 'total_amt', 'tax_amt'));
    }
    public function duePayment($contract_id)
    {
        $res = invoice::where('contract_id', $contract_id)->latest()->first();
        if($res==null){
            $overdue=0;
        }
        else{
            $overdue = Carbon::parse(Carbon::now())->diffInDays($res->invoice_period_end);

        }
        return response()->json(array('res' => $res, 'overdue' => $overdue));
    }

    // public function checck()
    // {

    //    $contracts=Contract::where('expire',0)->get();
    //    foreach($contracts as $c){
    //    $res= $c->last_paid_invoice;
    //    if($res){
    //     if(Carbon::parse($c->lease_start_date)->gte(Carbon::parse($res))){
    //         Contract::where('id',$c->id)->update(['expire',1]);
    //         return 0;
    //     }
    //     $LastPaid=Carbon::parse($res)->addMonths(1)->addDay(-1);
    //     if(Carbon::now()->gte($LastPaid)){
    //         $diffDays=Carbon::now()->diffInDays($LastPaid);
    //         Contract::where('id',$c->id)->update(['overdue'=>$diffDays]);
    //       }
    //    }
    //    else
    //    {
    //   $Od=Carbon::parse($c->lease_start_date)->addMonths(1)->addDay(-1);
    //   if(Carbon::now()->gte($Od)){
    //     $diffDays=Carbon::now()->diffInDays($Od);
    //     Contract::where('id',$c->id)->update(['overdue'=>$diffDays]);
    //   }  
    //    }
    //    }



    // }
}
