<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Nationality;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoiceDetails=Invoice::where('payment_status','Paid')->get();
        $contract=Contract::all();
        $tenant=Tenant::all();
        $lessor=Owner::all();
        $tenant_doc=Tenant::pluck('tenant_document');
        $tenant_nation=Nationality::pluck('name');
        $invoice=Invoice::all()->count();
        $total_amount=Invoice::withSum('Contract','rent_amount')->get()->sum('contract_sum_rent_amount');
        $total_amt=$invoice*$total_amount;
        $not_paid_invoice=Invoice::where('payment_status','Not Paid')->count();
        $delay_invoice=Invoice::whereNotNull('overdue_period')->count();
        $total_delay_amt=Invoice::withSum('Contract','rent_amount')->whereNotNull('overdue_period')->get()->sum('contract_sum_rent_amount');
        $total_delay=$delay_invoice*$total_delay_amt;
        $invoice_balance=$delay_invoice+$not_paid_invoice;
        $invoice_not_paid_amt=Invoice::withSum('Contract','rent_amount')->where('payment_status','Not Paid')->get()->sum('contract_sum_rent_amount');
$total_balance=$total_delay+($not_paid_invoice*$invoice_not_paid_amt);
        return view('admin.contract.contract_registration',compact('contract','tenant','tenant_doc','tenant_nation','lessor','invoiceDetails','total_amt','total_delay','invoice_balance','total_balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contract=Contract::all();
        return view('admin.contract.all_contract',compact('contract'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contract_code'=>'required',
            'tenant_name'=>'required',
            'document_type'=>'required',
            'tenant_mobile'=>'required',
            'contract_status'=>'required',
            'sponsor_name'=>'nullable',
            'sponsor_id'=>'nullable',
            'sponsor_nationality'=>'nullable',
            'sponsor_mobile'=>'nullable',
            'lessor'=>'required',
            'authorized_person'=>'required',
            'release_date'=>'required',
            'lease_start_date'=>'required',
            'lease_end_date'=>'required',
            'lease_period_month'=>'required',
            'lease_period_day'=>'required',
            'approved_by'=>'required',
            'attestation_no'=>'nullable',
            'attestation_expiry'=>'nullable',
            'rent_amount'=>'required',
            'total_invoice'=>'required',
            'guarantees'=>'required',
        ]);
        $mainpic='';
        if($request->hasFile('lessor_sign')){
            $mainpic='contract-'.time().'-'.rand(0,99).'.'.$request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'),$mainpic);
        }
          $mainpic2='';
        if($request->hasFile('tenant_sign')){
            $mainpic2='tenant-'.time().'-'.rand(0,99).'.'.$request->tenant_sign->extension();
            $request->tenant_sign->move(public_path('upload/contract/signature'),$mainpic2);
        }
       $data= Contract::create([
            'contract_code' => $request->contract_code,
            'tenant_name' => $request->tenant_name,
            'document_type'=>$request->document_type,
            'qid_document'=>$request->qid_document,
            'cr_document'=>$request->cr_document,
            'passport_document'=>$request->passport_document,
            'sponsor_nationality'=>$request->sponsor_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'tenant_mobile'=>$request->tenant_mobile,
            'tenant_nationality'=>$request->tenant_nationality,
            'lessor'=>$request->lessor,
            'authorized_person'=>$request->authorized_person,
            'lessor_sign'=>$mainpic,
            'release_date'=>$request->release_date,
            'lease_start_date'=>$request->lease_start_date,
            'lease_end_date'=>$request->lease_end_date,
            'lease_period_month'=>$request->lease_period_month,
            'lease_period_day'=>$request->lease_period_day,
            'is_grace'=>$request->grace,
            'grace_start_date'=>$request->grace_start_date,
            'grace_end_date'=>$request->grace_end_date,
            'grace_period_month'=>$request->grace_period_month,
            'grace_period_day'=>$request->grace_period_day,
            'approved_by'=>$request->approved_by,
            'attestation_no'=>$request->attestation_no,
            'attestation_status'=>$request->attestation_status,
            'attestation_expiry'=>$request->attestation_expiry,
            'contract_status'=>$request->contract_status,
            'rent_amount' => $request->rent_amount,
            'tenant_sign' =>$mainpic2,
            'total_invoice' => $request->total_invoice,
            'guarantees' => $request->guarantees,
            'guarantees_payment_method' => $request->guarantees_payment_method,

            'remark'=>$request->remark,
        ]);
        if($data){
        return redirect()->back()->with('success','Contract Registration has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Contract Registration not created.');
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
        $id = Crypt::decrypt($id);
        $contractedit=Contract::find($id);        
        $tenant=Tenant::pluck('tenant_english_name');
        $tenant_doc=Tenant::pluck('tenant_document');
        $tenant_nation=Nationality::pluck('name');
        return view('admin.contract.contract_registration',compact('contractedit','tenant','tenant_doc','tenant_nation'));
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
            'tenant_name'=>'required',
            'document_type'=>'required',
            'tenant_mobile'=>'required',
            'contract_status'=>'required',
            'sponsor_name'=>'nullable',
            'sponsor_id'=>'nullable',
            'sponsor_nationality'=>'nullable',
            'sponsor_mobile'=>'nullable',
            'authorized_person'=>'required',
            'lessor'=>'required',
            'release_date'=>'required',
            'lease_start_date'=>'required',
            'lease_end_date'=>'required',
            'lease_period_month'=>'required',
            'lease_period_day'=>'required',
            'approved_by'=>'required',
            'attestation_no'=>'nullable',
            'attestation_expiry'=>'nullable',
            'total_invoice'=>'required',
            'guarantees'=>'required',
        ]);
        $mainpic=Contract::find($id)->lessor_sign??''; 
        if($request->hasFile('lessor_sign')){
            $mainpic='build-'.time().'-'.rand(0,99).'.'.$request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'),$mainpic);
            $oldpic = Contract::find($id)->pluck('file')[0];
            File::delete(public_path('upload/contract/signature' . $oldpic));
            Contract::find($id)->update(['lessor_sign' => $mainpic]);
        }
        $mainpic2=Contract::find($id)->tenant_sign??'';        
        if($request->hasFile('tenant_sign')){
            $mainpic2='tenant-'.time().'-'.rand(0,99).'.'.$request->tenant_sign->extension();
            $request->tenant_sign->move(public_path('upload/contract/signature'),$mainpic2);
            $oldpic = Contract::find($id)->pluck('file')[0];
            File::delete(public_path('upload/contract/signature' . $oldpic));
            Contract::find($id)->update(['tenant_sign' => $mainpic2]);
        }
        $data=Contract::find($id)->update([
            'contract_code' => $request->contract_code,
            'tenant_name' => $request->tenant_name,
            'document_type'=>$request->document_type,
            'qid_document'=>$request->qid_document,
            'cr_document'=>$request->cr_document,
            'passport_document'=>$request->passport_document,
            'sponsor_nationality'=>$request->sponsor_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'tenant_mobile'=>$request->tenant_mobile,
            'tenant_nationality'=>$request->tenant_nationality,
            'lessor'=>$request->lessor,
            'authorized_person'=>$request->authorized_person,
            'lessor_sign'=>$mainpic,
            'release_date'=>$request->release_date,
            'lease_start_date'=>$request->lease_start_date,
            'lease_end_date'=>$request->lease_end_date,
            'lease_period_month'=>$request->lease_period_month,
            'lease_period_day'=>$request->lease_period_day,
            'grace_start_date'=>$request->grace_start_date,
            'grace_end_date'=>$request->grace_end_date,
            'grace_period_month'=>$request->grace_period_month,
            'grace_period_day'=>$request->grace_period_day,
            'approved_by'=>$request->approved_by,
            'attestation_no'=>$request->attestation_no,
            'attestation_status'=>$request->attestation_status,
            'attestation_expiry'=>$request->attestation_expiry,
            'contract_status'=>$request->contract_status,
            'rent_amount' => $request->rent_amount,
            'tenant_sign' =>$mainpic2,
            'remark'=>$request->remark,
            'total_invoice' => $request->total_invoice,
            'guarantees' => $request->guarantees,
            'guarantees_payment_method' => $request->guarantees_payment_method,


        ]);
        if($data)
        {
        return redirect()->back()->with('success','Contract Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Contract not created.');
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
        $data=Contract::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }
    public function fetchTenantDetails($tenant_name){
        $res=Tenant::where('tenant_type',$tenant_name)->get();
        $html=' <option value="">--Select Tenant--</option>';
                
        foreach($res as $r){
            $html .='<option value="'.$r->id.'">'.$r->tenant_english_name.'</option>';
        }
        return response()->json($html);
        }
    public function fetchTenant($tenant_name){
        $res=Tenant::where('id',$tenant_name)->first();
        return response()->json($res);
        }

}
