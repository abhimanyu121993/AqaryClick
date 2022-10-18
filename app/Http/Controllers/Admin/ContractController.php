<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Nationality;
use App\Models\Tenant;
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
        $contract=Contract::all();
        $tenant=Tenant::pluck('tenant_name');
        $tenant_doc=Tenant::pluck('tenant_document');
        $tenant_nation=Nationality::pluck('name');

        return view('admin.contract.contract_registration',compact('contract','tenant','tenant_doc','tenant_nation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        ]);
        $mainpic='';
        if($request->hasFile('lessor_sign')){
            $mainpic='contract-'.time().'-'.rand(0,99).'.'.$request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'),$mainpic);
        }
       $data= Contract::create([
            'tenant_type' => $request->tenant_type,
            'document_type'=>$request->document_type,
            'sponsor_nationality'=>$request->sponsor_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'tenant_mobile'=>$request->tenant_mobile,
            'lessor'=>$request->lessor,
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
            'attestation_expiry'=>$request->attestation_expiry,
            'contract_status'=>$request->contract_status,
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
        $contract=Contract::all();
        $tenant=Tenant::pluck('customer_type');
        $tenant_doc=Tenant::pluck('document_name');
        $tenant_nation=Nationality::pluck('name');
        return view('admin.contract.contract_registration',compact('contract','contractedit','tenant','tenant_doc','tenant_nation'));
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

        ]);
        $mainpic='';
        if($request->hasFile('lessor_sign')){
            $mainpic='build-'.time().'-'.rand(0,99).'.'.$request->lessor_sign->extension();
            $request->lessor_sign->move(public_path('upload/contract/signature'),$mainpic);
            $oldpic = Contract::find($id)->pluck('file')[0];
            File::delete(public_path('upload/building/' . $oldpic));
            Contract::find($id)->update(['lessor_sign' => $mainpic]);
        }
        $data=Contract::find($id)->update([
            'tenant_type' => $request->tenant_type,
            'document_type'=>$request->document_type,
            'sponsor_nationality'=>$request->sponsor_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'tenant_mobile'=>$request->tenant_mobile,
            'lessor'=>$request->lessor,
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
            'attestation_expiry'=>$request->attestation_expiry,
            'contract_status'=>$request->contract_status,
            'remark'=>$request->remark,


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
    public function fetchTenant($tenant_name){

        $res=Tenant::where('tenant_name',$tenant_name)->where('customer_type','Company')->first();
        return response()->json($res);
        }
}
