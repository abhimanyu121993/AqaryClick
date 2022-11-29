<?php

namespace App\Http\Controllers\admin;

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
use App\Models\Unit;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = invoice::pluck('contract_id');
        $max_id = Invoice::max('id') + 1;
        $INV = 'INV' . '-' . Carbon::now()->day . Carbon::now()->month . Carbon::now()->format('y') . '-' . $max_id;
        $tenantDetails = Tenant::all();
        $building = Building::all();
        $bank = Bank::all();
        $currency = currency::where('status', 1)->get();
        return view('admin.invoice.add_invoice', compact('tenantDetails', 'INV', 'building', 'bank', 'currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $invoice=Invoice::all();
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
        $request->validate([
            'tenant_name' => 'required',
            'contract' => 'required',
            'invoice_no'=>'required',

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
        $sar_amt=amcurrency::convert()->from($request->currency_type)->to('QAR')->amount((float)$request->amt_paid)->get();
        $due_amt = Contract::where('id', $request->contract_id)->first()->rent_amount;
        $inv_due = Invoice::where('contract_id', $request->contract_id)->latest()->first()->due_amt??0;
        $due_amt = $inv_due + $due_amt;
        $due_amt = (float)($due_amt - $amt_paid);
        $data = Invoice::create([
            'tenant_id' => $request->tenant_name,
            'contract_id' => $request->contract,
            'invoice_no' => $request->invoice_no,
            'due_date' => $request->due_date,
            'invoice_period_start' => $request->invoice_period_start,
            'invoice_period_end' => $request->invoice_period_end,
            'amt_paid' => $sar_amt,
            'due_amt' => $due_amt,
            'payment_method' => $request->payment_method,
            'tenant_account' => $request->tenant_account,
            'tenant_bank' => $request->tenant_bank,
            'tenant_sender' => $request->tenant_sender,
            'tenant_attachment' => json_encode($otherpic2),
            'benifitary_account' => $request->benifitary_account,
            'benifitary_bank' => $request->benifitary_bank,
            'benifitary_name' => $request->benifitary_name,
            'payment_status' => $request->payment_status,
            'overdue_period' => $overdue,
            'remark' => $request->remark,
            'attachment' => json_encode($otherpic),
        ]);
        if ($data) {
            return redirect(url('admin/invoice-print', $request->invoice_no))->with('success', 'Invoice has been created successfully.');
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
        $res = Contract::where('tenant_name', $tenant_id)->get();
        $html = ' <option value="" selected hidden disabled>--Select Contract--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->contract_code . ' (' ;
            $html .= isset($r->tenantDetails->buildingDetails)?$r->tenantDetails->buildingDetails->name:'No Bilding Found' ;
            $html .= ')' . '</option>';
        }
        return response()->json($html);
    }
    public function tenantBuilding($building_id)
    {
        if ($building_id == 'all') {
            $res = Tenant::all();
            $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
            }
        } else {
            $res = Tenant::where('building_name', $building_id)->get();
            $html = ' <option value=""selected hidden disabled>--Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
            }
        }
        return response()->json($html);
    }
    public function invoiceDetails($contract_id)
    {
        $res = Contract::where('id', $contract_id)->first();
        $inv = invoice::where('contract_id', $contract_id)->latest()->first();
        $invoicedate = strtotime($inv->invoice_period_end ?? 0);
        $leaseEnddate = strtotime($res->lease_end_date);

        if ($invoicedate > $leaseEnddate) {
            $res = invoice::where('contract_id', $contract_id)->latest()->first();
            
            if($res->due_amt==0){
                $msg = "Sorry! This Contract has been Expired.";
                $invoiceEnd = '';
                $invoiceStart = '';
                $payable = '';
                $due_amt = '';
                $rent_amt = '';
                $lastmonth = '';
            }
            else{
                $msg = "Sorry! This is last invoice for this contract .Pay Your Due Amount";
                $invoiceEnd = $res->invoice_period_end??'';
                $invoiceStart = $res->invoice_period_start??'';
                $payable = $res->due_amt??'';
                $due_amt = $res->due_amt??'';
                $rent_amt = 'No Rent Amount';
                $lastmonth = $res->invoice_period_end;
            }
           
        } else {
            $invoice = $inv->invoice_period_end ?? null;
            if ($invoice == !null) {
                return 0;
                $invoiceStart = $invoice;
                $invoiceEnd = Carbon::parse($invoice)->addMonth(1)->addDay(-1)->format('Y-m-d');
                $msg = '';
                $lastmonth = Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('Y-m-d');
                $due_amt = $inv->due_amt;
                $payable = $res->rent_amount + $due_amt;
                $rent_amt = $res->rent_amount;
            } else {
                $invoiceStart = $res->lease_start_date;
                $invoiceEnd = Carbon::parse($res->lease_start_date)->addMonth(1)->addDay(-1)->format('Y-m-d');
                $lastmonth = Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('Y-m-d');
                $msg = '';
                $due_amt = $inv->due_amt ?? 0;
                $payable = $res->rent_amount + $due_amt;
                $rent_amt = $res->rent_amount;
            }
        }
        if (Carbon::parse(Carbon::now()) < $invoiceEnd) {
            $overdue = "No Due ";
        } else {
            $overdue = Carbon::parse(Carbon::now())->diffInDays($invoiceEnd);
        }

        return response()->json(array('res' => $res, 'invoiceEnd' => $invoiceEnd, 'invoiceStart' => $invoiceStart, 'msg' => $msg, 'payable' => $payable, 'due_amt' => $due_amt, 'rent_amt' => $rent_amt, 'lastmonth' => $lastmonth, 'overdue' => $overdue));
    }

    public function printInvoice($invoice_no)
    {
        $invoice = Invoice::with('customerDetails')->with('TenantName')->where('invoice_no', $invoice_no)->first();
        $lessor=Customer::where('id',$invoice->customerDetails->lessor)->first();
        $symbol=currency::where('code','QAR')->first()->code;
        $unit_ref=Unit::where('building_id',$invoice->TenantName->building_name)->where('unit_type',$invoice->TenantName->unit_type)->first();      
        $cheque=Cheque::where('invoice_no',$invoice_no)->get();
        $company=BusinessDetail::where('id',$invoice->customerDetails->company_id)->first();
        return view('admin.invoice.invoice_details', compact('invoice','lessor','company','symbol','cheque','unit_ref'));
    }
    public function duePayment($contract_id)
    {
        $res = invoice::where('contract_id', $contract_id)->latest()->first();
        $overdue = Carbon::parse(Carbon::now())->diffInDays($res->invoice_period_end);
        return response()->json(array('res' => $res, 'overdue' => $overdue));
    }
public function receiptVouchure($invoice_no){
    $invoice = Invoice::with('customerDetails')->with('TenantName')->where('invoice_no', $invoice_no)->first();
    $lessor=Customer::where('id',$invoice->customerDetails->lessor)->first();
    $symbol=currency::where('code','QAR')->first()->symbol;
    $cheque=Cheque::where('invoice_no',$invoice_no)->first();
    $unit_ref=Unit::where('building_id',$invoice->TenantName->building_name)->where('unit_type',$invoice->TenantName->unit_type)->first();      
    $cheque=Cheque::where('invoice_no',$invoice_no)->get();
    $company=BusinessDetail::where('id',$invoice->customerDetails->company_id)->first();
    return view('admin.invoice.receipt_vouchar',compact('invoice','lessor','company','symbol','cheque','unit_ref','cheque'));
}
}
