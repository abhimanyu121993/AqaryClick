<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\CompanyDocument;
use App\Models\OwnerCompany;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customer=Customer::all();
        return view('admin.customer.register');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'email'=>'required',
            'phone' => 'required',
            'bank_name'=>'required',
            'account_number'=>'required',
            'ifsc'=>'required',
            'company_name'=>'required',
            'company_add'=>'required',
            'person'=>'required',
            'bank_name'=>'required',
        ]);
       $user= User::create([
            'first_name' => $request->name,
            'last_name' => $request->name,
            'address' => $request->name,
            'email'=>$request->email,
            'phone' => $request->name
        ]);
        if($request->hasFile('company_logo'))
        {
            $company='Copnamy-logo-'.time().'-'.rand(0,99).'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('company/logo/'),$company);
            $logo = 'company/logo/'.$company;
        }
        $company=OwnerCompany::create([
            'user_id'=>$user->id,
            'company_name'=>$request->company,
            'company_address'=>$request->company_address,
            'authorised_manager'=>$request->authorised_manager,
            'company_logo'=>$logo
        ]);
        $bankdata=BankDetail::create([
            'user_id'=>$user->id,
            'company_id'=>$company->id,
            'bank_name'=>$request->bank_detail,
            'acccount_number'=>$request->acccount_number,
            'ifsc'=>$request->ifsc
        ]);
        if($request->hasFile('document_file'))
        {
            $document='Copnamy-logo-'.time().'-'.rand(0,99).'.'.$request->document_file->extension();
            $request->company_logo->move(public_path('company/document/'),$document);
            $logo = 'company/document/'.$document;
        }
        $company_document=CompanyDocument::create([

        ]);
        if($user){
        return redirect()->back()->with('success','Customer has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Customer not created.');
        }
        if($bankdata)
        {
            return redirect()->back()->with('success','Bank Detail has been  Entered.');
        }
        else
        {
            return redirect()->back()->with('success','ERROR');

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
}
