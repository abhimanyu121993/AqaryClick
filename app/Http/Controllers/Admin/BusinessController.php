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
use Illuminate\Support\Facades\Crypt;

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
        $role = Auth::user()->roles[0]->name;
        if ($role == 'superadmin') {
            $business = BusinessDetail::all();

        } else {
            $business = BusinessDetail::where('user_id', Auth::user()->id)->get();
            // $bank=BankDetail::where('user_id', Auth::user()->id)->get();


        }
        return view('admin.business.all_business', compact('business'));
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
        $logo = '';
        if ($request->hasFile('company_logo')) {
            $company = 'Company-logo-' . time() . '-' . rand(0, 99) . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('upload/company/logo/'), $company);
            $logo = $company;
        }
        $business = BusinessDetail::create([
            'user_id' => Auth::user()->id,
            'customer_type' => $request->customer_type,
            'business_type' => $request->business_type,
            'business_name' => $request->business_name,
            'cr_no' => $request->cr_reg_no,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_box' => $request->post_box,
            'authorized_person' => $request->authorized_person,
            'logo' => $logo,
            'activity' => $request->company_activity,

        ]);
        if ($request->bank_name == !null) {
            for ($i = 0; $i < count($request->bank_name); $i++) {

                $bankdata = BankDetail::create([
                    'user_id' => Auth::user()->id,
                    'business_id' => $business->id,
                    'bank_name' => $request->bank_name[$i],
                    'account_number' => $request->account_number[$i],
                    'ifsc' => $request->ifsc[$i],
                    'swift' => $request->swift[$i],
                    'iban_no' => $request->iban_no[$i]
                ]);
            }
        }
        if ($request->document_name != null) {
            $file = $request->file('docfile');
            foreach ($request->document_name as $k => $doc) {
                $name = 'logo-' . time() . '-' . rand(0, 99) . '.' . $file[$k]->extension();
                $file[$k]->move(public_path('company/document'), $name);
                $otherpic[] = $name;
                $company_document = BusinessDocument::create([
                    'business_id' => $business->id,
                    'document_name' => $request->document_name[$k],
                    'file' => $otherpic[$k],
                    'expire_date' => $request->document_exp_date[$k],
                ]);
            }
        }
        if ($business) {
            return redirect()->back()->with('success', 'Business has been created successfully.');
        } else {
            return redirect()->back()->with('error', 'Business not created.');
        }
        if ($bankdata) {
            return redirect()->back()->with('success', 'Bank Detail has been  Entered.');
        } else {
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
        $id = Crypt::decrypt($id);
        $business = BusinessDetail::find($id);
        return view('admin.business.register', compact('business'));
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

    public function businessDocumentDetail($id)
    {
        $id = Crypt::decrypt($id);
        $document = BusinessDocument::where('id',$id)->get();
        return view('admin.business.business_document', compact('document'));
    }
    public function showBankDetail($id)
    {
        $id = Crypt::decrypt($id);
        $bank = BankDetail::where('id',$id)->get();
        return view('admin.business.customer_bank_detail', compact('bank'));
    }
    public function updateBankDetails(Request $request)
    {
        dd($request);
        $request->validate([
            // 'name' => 'required',
            // 'currency_code'=>'required',
        ]);
       $data= BankDetail::find($id)->update([
        'business_id' => $request->business_id,
        'user_id'=>Auth::user()->id,
        'bank_name' => $request->bank_name,
        'account_number' => $request->account_number,
        'iban_no'=>$request->iban_no,
        'ifsc'=>$request->ifsc,
        'swift'=>$request->swift,

        ]);
        if($data){
        return redirect()->back()->with('success','Bank Details Updated successfully.');
        }
        else{
            return redirect()->back()->with('error','Bank Details not Updated.');
        }    }
    public function usercompanydelete($id)
    {
        $companydel = OwnerCompany::find($id)->delete();
        return redirect()->back();
    }
    public function userbankdelete($id)
    {
        $companydel = BankDetail::find($id)->delete();
        return redirect()->back();
    }
}
