<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\BusinessDetail;
use App\Models\BusinessDocument;
use App\Models\CompanyDocument;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.business.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
            $user=BusinessDetail::all();
        }
        else{
            $user=BusinessDetail::where('user_id',Auth::user()->id)->get();
        }
        return view('admin.business.all_customer',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'address' => 'required',
        //     'email'=>'required',
        //     'phone' => 'required',
        //     'bank_name'=>'required',
        //     'account_number'=>'required',
        //     'ifsc'=>'required',
        //     'company_name'=>'required',
        //     'company_add'=>'required',
        //     'person'=>'required',
        //     'customer_code'=>'required',
        //     'bank_name'=>'required',
        // ]);
        $logo='';
        if($request->hasFile('company_logo'))
        {
            $company='Copnamy-logo-'.time().'-'.rand(0,99).'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('company/logo/'),$company);
            $logo = 'company/logo/'.$company;
        }
       $business= BusinessDetail::create([
            'customer_type' => $request->customer_type,
            'business_type' => $request->business_type,
            'business_name' => $request->business_name,
            'cr_no'=>$request->cr_reg_no,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'authorized_person'=>$request->authorized_person,
            'logo'=>$logo,
            'activity'=>$request->company_activity,

        ]);
        $bankdata=BankDetail::create([
            'user_id'=>Auth::user()->id,
            'business_id'=>$business->id,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'ifsc'=>$request->ifsc,
            'swift'=>$request->swift,
            'iban_no'=>$request->iban_no
        ]);
        $document='';
        if($request->hasFile('document_file'))
        {
            $document='Copnamy-logo-'.time().'-'.rand(0,99).'.'.$request->document_file->extension();
            $request->document_file->move(public_path('company/document/'),$document);
            $document_img= 'company/document/'.$document;
        }
        $company_document=BusinessDocument::create([
            'business_id'=>$business->id,
            'document_name'=>$request->document_name,
            'file'=>$document,
            'expire_date'=>$request->document_exp_date,
        ]);
        if($business){
        return redirect()->back()->with('success','Business has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Business not created.');
        }
        if($bankdata)
        {
            return redirect()->back()->with('success','Bank Detail has been  Entered.');
        }
        else
        {
            return redirect()->back();

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

    public function companyOwnerDetail($id)
    {
        $company_details=User::find($id);
        return view('admin.business.customer_company',compact('company_details'));
    }
    public function bankdetail()
    {
        return view('admin.business.customer_bank_detail');
    }

    public function showBankDetail($id)
    {
        $bank_details=User::find($id);
        return view('admin.business.customer_bank_detail',compact('bank_details'));
    }

    public function usercompanydelete($id)
    {
        $companydel=OwnerCompany::find($id)->delete();
        return redirect()->back();
    }
    public function userbankdelete($id)
    {
        $companydel=BankDetail::find($id)->delete();
        return redirect()->back();
    }
}
