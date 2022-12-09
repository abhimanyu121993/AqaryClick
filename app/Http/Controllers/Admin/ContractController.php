<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\currency;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Nationality;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\Tenant;
use AmrShawky\LaravelCurrency\Facade\Currency as amcurrency;
use App\Mail\ContractMail;
use App\Models\BusinessDetail;
use App\Models\ContractRecipt;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $invoiceDetails = Invoice::where('payment_status', 'Paid')->get();
        $contract = Contract::all();
        $tenant = Tenant::all();
        $lessor = Customer::all();
        $tenant_doc = Tenant::pluck('tenant_document');
        $tenant_nation = Nationality::pluck('name');
        $invoice = Invoice::all()->count();
        $total_amount = Invoice::withSum('Contract', 'rent_amount')->get()->sum('contract_sum_rent_amount');
        $total_amt = $invoice * $total_amount;
        $not_paid_invoice = Invoice::where('payment_status', 'Not Paid')->count();
        $delay_invoice = Invoice::whereNotNull('overdue_period')->count()??'0';
        $total_delay_amt = Invoice::withSum('Contract', 'rent_amount')->whereNotNull('overdue_period')->get()->sum('contract_sum_rent_amount');
        $total_delay = $delay_invoice * $total_delay_amt;
        $invoice_balance = $delay_invoice + $not_paid_invoice;
        $invoice_not_paid_amt = Invoice::withSum('Contract', 'rent_amount')->where('payment_status', 'Not Paid')->get()->sum('contract_sum_rent_amount');
        $total_balance = $total_delay + ($not_paid_invoice * $invoice_not_paid_amt);
        $currency = currency::where('status', 1)->get();
        return view('admin.contract.contract_registration', compact('contract', 'tenant', 'tenant_doc', 'tenant_nation', 'lessor', 'invoiceDetails', 'total_amt', 'total_delay', 'invoice_balance', 'total_balance', 'currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = Auth::user()->roles[0]->name;
        if ($role == 'superadmin') {
            $contract = Contract::all();
        } else {
            $contract = Contract::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.contract.all_contract', compact('contract'));
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
            'document_type' => 'required',
            'tenant_mobile' => 'required',
            'contract_status' => 'required',
            'sponsor_name' => 'nullable',
            'sponsor_id' => 'nullable',
            'sponsor_nationality' => 'nullable',
            'sponsor_mobile' => 'nullable',
            'lessor' => 'required',
            'authorized_person' => 'required',
            'release_date' => 'required',
            'lease_start_date' => 'required',
            'lease_end_date' => 'required',
            'lease_period_month' => 'required',
            'lease_period_day' => 'required',
            'approved_by' => 'required',
            'attestation_no' => 'nullable',
            'attestation_expiry' => 'nullable',
            'currency_type' => 'required',
            'rent_amount' => 'required',
            'total_invoice' => 'required',
            'guarantees' => 'required',
            'contract_type' => 'required',

        ]);
        $mainpic = '';
        if ($request->hasFile('lessor_sign')) {
            $mainpic = 'contract-' . time() . '-' . rand(0, 99) . '.' . $request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'), $mainpic);
        }
        $mainpic2 = '';
        if ($request->hasFile('tenant_sign')) {
            $mainpic2 = 'tenant-' . time() . '-' . rand(0, 99) . '.' . $request->tenant_sign->extension();
            $request->tenant_sign->move(public_path('upload/contract/signature'), $mainpic2);
        }
        $sar_amt = amcurrency::convert()->from($request->currency_type)->to('QAR')->amount((float)$request->rent_amount)->get();
        $tnationlity = Tenant::where('id', $request->tenant_name)->first()->tenant_nationality;
        $snationlity = Tenant::where('id', $request->tenant_name)->first()->sponser_nationality;

        $tenant = Tenant::find($request->tenant_name);
        $contract_code='CC-'.$tenant->unittypeinfo->name[0].'-'.$tenant->buildingDetails->zone_no.'-'.$tenant->buildingDetails->building_no.'-'.$tenant->unit_no.'-'.Carbon::now()->format('y');
        $conn = Contract::with('tenantDetails')->where('contract_code', $contract_code)->first();
        $contract = ContractRecipt::first();
        $data = Contract::create([
            'user_id' => Auth::user()->id,
            'contract_code' => $contract_code,
            'tenant_name' => $request->tenant_name,
            'document_type' => $request->document_type,
            'qid_document' => $request->qid_document,
            'cr_document' => $request->cr_document,
            'passport_document' => $request->passport_document,
            'sponsor_nationality' =>$snationlity,
            'sponsor_id' => $request->sponsor_id,
            'sponsor_name' => $request->sponsor_name,
            'sponsor_mobile' => $request->sponsor_mobile,
            'tenant_mobile' => $request->tenant_mobile,
            'tenant_nationality' => $tnationlity,
            'lessor' => $request->lessor,
            'company_id' => $request->company_id,
            'authorized_person' => $request->authorized_person,
            'lessor_sign' => $mainpic,
            'release_date' => $request->release_date,
            'lease_start_date' => $request->lease_start_date,
            'lease_end_date' => $request->lease_end_date,
            'lease_period_month' => $request->lease_period_month,
            'lease_period_day' => $request->lease_period_day,
            'is_grace' => $request->grace,
            'grace_start_date' => json_encode($request->grace_start_date),
            'grace_end_date' => json_encode($request->grace_end_date),
            'grace_period_month' => json_encode($request->grace_period_month),
            'grace_period_day' => json_encode($request->grace_period_day),
            'approved_by' => $request->approved_by,
            'attestation_no' => $request->attestation_no,
            'attestation_status' => $request->attestation_status,
            'attestation_expiry' => $request->attestation_expiry,
            'contract_status' => $request->contract_status,
            'rent_amount' => $sar_amt,
            'currency' => $request->currency_type,
            'user_amt' => $request->rent_amount,
            'tenant_sign' => $mainpic2,
            'total_invoice' => $request->total_invoice,
            'guarantees' => $request->guarantees,
            'contract_type' => $request->contract_type,
            'guarantees_payment_method' => $request->guarantees_payment_method,
            'remark' => $request->remark,
        ]);
        // dd($data);
        if ($data) {

            // $contract->tenantDetails->email
            Mail::to('o6323756@gmail.com')->send(new ContractMail($data,$conn,$contract));
            return redirect(route('admin.receipt', $contract_code))->with('success', 'Contract Registration has been created successfully.');
        } else {
            return redirect()->back()->with('error', 'Contract Registration not created.');
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
        $invoiceDetails = Invoice::where('payment_status', 'Paid')->get();

        $invoice = Invoice::all()->count();
        $total_amount = Invoice::withSum('Contract', 'rent_amount')->get()->sum('contract_sum_rent_amount');
        $total_amt = $invoice * $total_amount;
        $not_paid_invoice = Invoice::where('payment_status', 'Not Paid')->count();
        $delay_invoice = Invoice::whereNotNull('overdue_period')->count();
        $total_delay_amt = Invoice::withSum('Contract', 'rent_amount')->whereNotNull('overdue_period')->get()->sum('contract_sum_rent_amount');
        $total_delay = $delay_invoice * $total_delay_amt;
        $invoice_balance = $delay_invoice + $not_paid_invoice;
        $invoice_not_paid_amt = Invoice::withSum('Contract', 'rent_amount')->where('payment_status', 'Not Paid')->get()->sum('contract_sum_rent_amount');
        $total_balance = $total_delay + ($not_paid_invoice * $invoice_not_paid_amt);

        $id = Crypt::decrypt($id);
        $contractedit = Contract::find($id);
        $tenant = Tenant::pluck('tenant_english_name');
        $tenant_doc = Tenant::pluck('tenant_document');
        $tenant_nation = Nationality::pluck('name');
        return view('admin.contract.contract_registration', compact('contractedit', 'tenant', 'tenant_doc', 'tenant_nation', 'invoiceDetails', 'invoiceDetails', 'total_amt', 'total_delay', 'invoice_balance', 'total_balance'));
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
        $request->validate([
            'tenant_name' => 'required',
            'document_type' => 'required',
            'tenant_mobile' => 'required',
            'contract_status' => 'required',
            'sponsor_name' => 'nullable',
            'sponsor_id' => 'nullable',
            'sponsor_nationality' => 'nullable',
            'sponsor_mobile' => 'nullable',
            'authorized_person' => 'required',
            'lessor' => 'required',
            'release_date' => 'required',
            'lease_start_date' => 'required',
            'lease_end_date' => 'required',
            'lease_period_month' => 'required',
            'lease_period_day' => 'required',
            'approved_by' => 'required',
            'attestation_no' => 'nullable',
            'attestation_expiry' => 'nullable',
            'total_invoice' => 'required',
            'guarantees' => 'required',
            'currency_type' => 'required',
            'contract_type' => 'required',
        ]);
        $sar_amt = amcurrency::convert()->from($request->currency_type)->to('QAR')->amount($request->rent_amount)->get();


        $mainpic = Contract::find($id)->lessor_sign ?? '';
        if ($request->hasFile('lessor_sign')) {
            $mainpic = 'build-' . time() . '-' . rand(0, 99) . '.' . $request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'), $mainpic);
            $oldpic = Contract::find($id)->pluck('file')[0];
            File::delete(public_path('upload/contract/signature' . $oldpic));
            Contract::find($id)->update(['lessor_sign' => $mainpic]);
        }
        $mainpic2 = Contract::find($id)->tenant_sign ?? '';
        if ($request->hasFile('tenant_sign')) {
            $mainpic2 = 'tenant-' . time() . '-' . rand(0, 99) . '.' . $request->tenant_sign->extension();
            $request->tenant_sign->move(public_path('upload/contract/signature'), $mainpic2);
            $oldpic = Contract::find($id)->pluck('file')[0];
            File::delete(public_path('upload/contract/signature' . $oldpic));
            Contract::find($id)->update(['tenant_sign' => $mainpic2]);
        }
        $data = Contract::find($id)->update([
            'user' => Auth::user()->id,
            'contract_code' => $request->contract_code,
            'tenant_name' => $request->tenant_name,
            'document_type' => $request->document_type,
            'qid_document' => $request->qid_document,
            'cr_document' => $request->cr_document,
            'passport_document' => $request->passport_document,
            'sponsor_nationality' => $request->sponsor_nationality,
            'sponsor_id' => $request->sponsor_id,
            'sponsor_name' => $request->sponsor_name,
            'sponsor_mobile' => $request->sponsor_mobile,
            'tenant_mobile' => $request->tenant_mobile,
            'tenant_nationality' => $request->tenant_nationality,
            'lessor' => $request->lessor,
            'company_id' => $request->company_id,
            'authorized_person' => $request->authorized_person,
            'lessor_sign' => $mainpic,
            'release_date' => $request->release_date,
            'lease_start_date' => $request->lease_start_date,
            'lease_end_date' => $request->lease_end_date,
            'lease_period_month' => $request->lease_period_month,
            'lease_period_day' => $request->lease_period_day,
            'grace_start_date' => json_encode($request->grace_start_date),
            'grace_end_date' => json_encode($request->grace_end_date),
            'grace_period_month' => json_encode($request->grace_period_month),
            'grace_period_day' => json_encode($request->grace_period_day),
            'approved_by' => $request->approved_by,
            'attestation_no' => $request->attestation_no,
            'attestation_status' => $request->attestation_status,
            'attestation_expiry' => $request->attestation_expiry,
            'contract_status' => $request->contract_status,
            'currency' => $request->currency,
            'rent_amount' => $sar_amt,
            'user_amt' => $request->rent_amount,
            'tenant_sign' => $mainpic2,
            'remark' => $request->remark,
            'total_invoice' => $request->total_invoice,
            'guarantees' => $request->guarantees,
            'contract_type' => $request->contract_type,
            'guarantees_payment_method' => $request->guarantees_payment_method,


        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Contract Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Contract not created.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data = Contract::find($id);
        if ($data->delete()) {
            return redirect()->back()->with('success', 'Data Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Data not deleted.');
        }
    }
    public function fetchTenantDetails($tenant_name)
    {
        $res = Tenant::where('tenant_type', $tenant_name)->get();
        $html = ' <option value="">--Select Tenant--</option>';

        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
        }
        return response()->json($html);
    }
    public function fetchCompany($lessor_id)
    {
        $res = BusinessDetail::where('user_id', $lessor_id)->get();
        $html = ' <option value="" selected hidden>--Select Business--</option>';

        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->business_name . '</option>';
        }
        return response()->json($html);
    }
    public function fetchTenant($tenant_name)
    {
        $res = Tenant::with('tenantNationality')->with('nationality')->where('id', $tenant_name)->first();
        return response()->json($res);
    }
    public function fetchAuthorizedPerson($company_id)
    {
        $res = BusinessDetail::where('id', $company_id)->first();
        return response()->json($res);
    }
    public function fetchContractLease($contract_id)
    {
        $res = Contract::where('id', $contract_id)->latest()->first();
        $to = Carbon::parse($res->lease_end_date)->addYear(1);
        $from = Carbon::parse($res->lease_end_date);
        $diff_in_months = $to->diffInMonths($from);
        $diff_in_Days = $to->diffInDays($from);
        $diff_in_Years = $to->diffInYears($from);
        $formatted_dt = Carbon::parse($res->lease_end_date)->addYear(1)->format('Y-m-d');
        return response()->json(array('res' => $res, 'date' => $formatted_dt, 'diff_in_months' => $diff_in_months, 'diff_in_Days' => $diff_in_Days, 'diff_in_Years' => $diff_in_Years));
    }

    public function Overdue()
    {
        $res = Invoice::where('payment_status', 'Paid')->pluck('contract_id');
        $tenant = Contract::with('tenantDetails')->where('overdue', '>=', 90)->whereNotIn('id', $res)->get();
        return view('admin.contract.overdue', compact('tenant'));
    }
    public function contractNumber($tenant_id)
    {
        $contract_code = Contract::with('tenantDetails')->where('tenant_name', $tenant_id)->get();
        dd($contract_code);
        $CC = 'CC' . '-' . Carbon::now()->month . '-' . Carbon::now()->format('y');
        return response()->json($CC);
    }

    public function contractReceipt($contract_code)
    {
        $conn = Contract::with('tenantDetails')->where('contract_code', $contract_code)->first();
        $contract = ContractRecipt::first();
        return view('admin.contract.contract_receipt', compact('conn', 'contract'));
    }
    public function isReject($id)
    {
        $ass_reject = Contract::find($id);

        if ($ass_reject->status == 1) {
            $ass_reject->status = 0;
        } else {
            $ass_reject->status = true;
        }
        if ($ass_reject->update()) {
            return 1;
        } else {
            return 0;
        }
    }
    public function generatePDF($contract_code)
    {
        $conn = Contract::where('contract_code', $contract_code)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.contract.contract_receipt', compact('conn'));
        return $pdf->download('AqaryClick-Contract-' . $contract_code . '.pdf');
    }


    public function graceDetails($id)
    {
        $graceDetails = Contract::find($id);
        $grace_start = json_decode($graceDetails->grace_start_date);
        $grace_end = json_decode($graceDetails->grace_end_date);
        $grace_day = json_decode($graceDetails->grace_period_day);
        $grace_month = json_decode($graceDetails->grace_period_month);

        return view('admin.contract.grace_contract', compact('grace_start','grace_end','grace_day','grace_month'));
    }

    public function bulkUpload(Request $request)
    {


        if($request->hasFile('bulk_upload')){
            $file = $request->bulk_upload;
            $filename = time() . $file->getClientOriginalName();
            // dd($filename);
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $maxFileSize = 2097152;
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'uploads/contract';
                    // Upload file
                    $file->move(public_path($location), $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                        $num = count($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    // dd($importData_arr);
                    // Insert to MySQL database

                    foreach ($importData_arr as $importData) {
                        $tenant_id = '';
                        $tenant=Tenant::where('user_id', Auth::user()->id)->where('tenant_english_name', $importData[0])->where('sponsor_oid',$importData[3])->where('tenant_primary_mobile',$importData[4])->first();
                        // return $tenant;
                        if ($tenant) {
                        $contract_code= 'CC-'.$tenant->unittypeinfo->name[0].'-'.$tenant->buildingDetails->zone_no.'-'.$tenant->buildingDetails->building_no.'-'.$tenant->unit_no.'-'.Carbon::now()->format('y');
                            $tenant_id = $tenant->id;
                            $insertData = array(
                                "user_id" => Auth::user()->id,
                                "contract_code" => $contract_code,
                                "tenant_name" => $tenant_id,
                                'lessor'=>'',
                                'sponsor_name'=>$importData[2],
                                'sponsor_id'=>$importData[3],
                                'tenant_mobile'=>$importData[4],
                                'attestation_no'=>$importData[5],
                                'attestation_expiry'=>$importData[6],
                                'created_at'=>Carbon::createFromFormat('d-M-Y',$importData[8])->timestamp,
                                'release_date'=>$importData[9],
                                'lease_start_date'=>$importData[10],
                                'lease_end_date'=>$importData[11],
                                'lease_period_month'=>$importData[12],
                                'discount'=>$importData[14],
                                'increament_term'=>$importData[15],
                                'contract_status'=>$importData[16],
                                'contract_type'=>'Internal',

                            );
                            // dd($insertData);
                            if (count($insertData)>0) {
                                Contract::Create($insertData);

                            }

                        }
                        else{
                            Session::flash('error', 'Data Imported But Some Importing Cancelled Due To Tenant not found');
                            return redirect()->back();
                        }
                    }
                    Session::flash('success', 'Import Successful.');
                    return redirect()->back();
                } else {
                    Session::flash('error', 'File too large. File must be less than 2MB.');
                    return redirect()->back();
                }
            }
        }else{
            Session::flash('error', 'Please upload a valid .csv file only');
            return redirect()->back();
        }
    }

    public function ImportExportContract(){
        return view('admin.contract.import_export');
    }
}
