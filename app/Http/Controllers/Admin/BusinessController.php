<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\BusinessDetail;
use App\Models\BusinessDocument;
use App\Models\CompanyDocument;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class BusinessController extends Controller
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
        $this->getUser();
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
            'user_id' => $this->user_id,
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
                $file[$k]->move(public_path('upload/company/document'), $name);
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
        $document = BusinessDocument::where('id', $id)->get();
        return view('admin.business.business_document', compact('document'));
    }
    public function showBankDetail($id)
    {
        $id = Crypt::decrypt($id);
        $bank = BankDetail::where('id', $id)->get();
        $editbank = BankDetail::find($id);
        return view('admin.business.customer_bank_detail', compact('bank', 'editbank'));
    }

    public function editBankDetails($id)
    {
        $id = Crypt::decrypt($id);
        $bank = BankDetail::where('id', $id)->get();
        $editbank = BankDetail::find($id);
        return view('admin.business.customer_bank_detail', compact('bank', 'editbank'));
    }

    public function updateBankDetails(Request $request, $id)
    {
        $data = BankDetail::find($id)->update([
            'user_id' => Auth::user()->id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'iban_no' => $request->iban_no,
            'ifsc' => $request->ifsc,
            'swift' => $request->swift,
        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Bank Details Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Bank Details not Updated.');
        }
    }

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

    public function editDocument($id)
    {
        $id = Crypt::decrypt($id);
        $document = BusinessDocument::where('id', $id)->get();
        $editdocument = BusinessDocument::find($id);
        return view('admin.business.business_document', compact('editdocument', 'document'));
    }
    public function updateDocuments(Request $request, $id)
    {
        // dd($id);
        $file = $request->file('docfile');
        foreach ($request->document_name as $k => $doc) {
            $name = 'logo-' . time() . '-' . rand(0, 99) . '.' . $file[$k]->extension();
            $file[$k]->move(public_path('upload/company/document'), $name);
            $otherpic[] = $name;
            $company_document = BusinessDocument::find($id)->update([
                'document_name' => $request->document_name[$k],
                'file' => $otherpic[$k],
                'expire_date' => $request->document_exp_date[$k],
            ]);
        }
        if ($company_document) {
            return redirect()->back()->with('success', 'Business has been updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Something Went Wron .');
        }
    }
    public function DocumentDownload($path)
    {
        $filePath = public_path('upload/company/document/' . $path);
        return Response::download($filePath);
    }

    public function modalBusinessDetail(Request $request)
    {
        // dd($request);
        $logo = '';
        if ($request->hasFile('company_logo')) {
            $company = 'Company-logo-' . time() . '-' . rand(0, 99) . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('upload/company/logo/'), $company);
            $logo = $company;
        }
        if (Auth::user()->customerDetail->step == 0) {
            $business = BusinessDetail::create([
                'user_id' => Auth::user()->id,
                'customer_type' => $request->customer_type,
                'business_type' => $request->business_type,
                'business_name' => $request->business_name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'post_box' => $request->post_box,
                'authorized_person' => $request->authorized_person,
                'logo' => $logo,
                'activity' => $request->company_activity,
            ]);
            $buss = Customer::find(Auth::user()->customerDetail->id)->update(['step' => 1]);
        }
        if ($business) {
            return redirect(url('admin/dashboard'))->with('success', 'Business has been updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Business has not been updated successfully.');
        }
    }

    public function modalBusinessDocument(Request $request)
    {

        $business = BusinessDetail::get();
        // dd($business);
        $user = Auth::user()->id;
        // dd($user);
        $bus = BusinessDetail::where('user_id', $user)->first();
        $file = $request->file('docfile');
        foreach ($request->document_name as $k => $doc) {
            $name = 'logo-' . time() . '-' . rand(0, 99) . '.' . $file[$k]->extension();
            $file[$k]->move(public_path('upload/company/document'), $name);
            $otherpic[] = $name;
            if (Auth::user()->customerDetail->step == 1) {
                $company_document = BusinessDocument::create([
                    'business_id' => $bus->id,
                    'document_name' => $request->document_name[$k],
                    'file' => $otherpic[$k],
                    'expire_date' => $request->document_exp_date[$k],
                ]);
                $buss = Customer::find(Auth::user()->customerDetail->id)->update(['step' => 2]);
            }


            if ($company_document) {
                return redirect(url('admin/dashboard'))->with('success', 'Business has been updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Business has not been updated successfully.');
            }
        }
    }

    public function modalBusinessBankDocument(Request $request)
    {
        $user = Auth::user()->id;
        $bus = BusinessDetail::where('user_id', $user)->first();
        if (Auth::user()->customerDetail->step == 2) {
        $bankdata = BankDetail::create([
            'user_id' => Auth::user()->id,
            'business_id' => $bus->id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'swift' => $request->swift,
            'iban_no' => $request->iban_no
        ]);
        $buss = Customer::find(Auth::user()->customerDetail->id)->update(['step' => 3]);

    }
        if ($bankdata) {
            return redirect(url('admin/dashboard'))->with('success', 'Business has been updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Business has not been updated successfully.');
        }
    }
}
