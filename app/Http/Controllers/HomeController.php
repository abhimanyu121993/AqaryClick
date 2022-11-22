<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\Building;
use App\Models\CompanyDocument;
use App\Models\ContactUs;
use App\Models\Nationality;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\UnitType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $nationality = Nationality::all();
        $unit=UnitType::all();
        $nation=Nationality::all();
        $building=Building::all();
        $buildings = Building::get();
        // dd($buildings);
        return view('welcome', compact('nationality','unit','nation','building', 'buildings'));
    }

    public function about()
    {
        $nationality = Nationality::get();
        return view('home.about', compact('nationality'));
    }
    public function properties()
    {
        $nationality = Nationality::get();
        return view('home.properties', compact('nationality'));
    }
    public function regOverView()
    {
        $nationality = Nationality::get();
        return view('home.registration', compact('nationality'));
    }
    public function propertie_details()
    {
        $nationality = Nationality::get();
        return view('home.propertie-details', compact('nationality'));
    }

    public function contect()
    {
        $nationality = Nationality::get();
        return view('home.contect', compact('nationality'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'email' => 'nullable',
            'message' => 'required'
        ]);
        $con = ContactUs::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);
        if($con){
            return redirect()->back()->with('success', 'Contact sent successfully');
        }
        else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            // 'last_name' => 'required',
        //     'address' => 'required',
            'email'=>'required',
            'password'=>'required',
        //     'phone' => 'required',
        //     'bank_name'=>'required',
        //     'account_number'=>'required',
        //     'ifsc'=>'required',
        //     'company_name'=>'required',
        //     'company_add'=>'required',
        //     'person'=>'required',
        //     'customer_code'=>'required',
        //     'bank_name'=>'required',
         ]);
        if($request->password==null){
            $nUser= User::create([
                'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'phone' => $request->phone,
            'password'=>Hash::make(123456),
            'customer_code' => $request->customer_code,
            'customer_type'=>$request->customer_type
            ]);
        }
        else{
            $nUser= User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email'=>$request->email,
                'phone' => $request->phone,
                'password'=>Hash::make($request->password),
                'customer_code' => $request->customer_code,
                'customer_type'=>$request->customer_type
            ]);
        }
        $nUser->assignRole('Owner');
       $user= Owner::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'email'=>$request->email,
            'phone' => $request->phone,
            'customer_code' => $request->customer_code,
            'customer_type'=>$request->customer_type
        ]);
        $logo='';
        if($request->hasFile('company_logo'))
        {
            $company='Copnamy-logo-'.time().'-'.rand(0,99).'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('company/logo/'),$company);
            $logo = 'company/logo/'.$company;
        }
        $company=OwnerCompany::create([
            'user_id'=>$user->id,
            'company_name'=>$request->company_name,
            'company_address'=>$request->company_address,
            'authorised_manager'=>$request->authorised_manager,
            'company_activity'=>$request->company_activity,
            'company_logo'=>$logo,
        ]);
        $bankdata=BankDetail::create([
            'user_id'=>$user->id,
            'company_id'=>$company->id,
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
        $company_document=CompanyDocument::create([
            'company_id'=>$company->id,
            'document_file'=>$document,
            'serial_number'=>$request->serial_number,
            'document_exp_date'=>$request->document_exp_date,
            'document_name'=>$request->document_name
        ]);
        if($user){
        return redirect()->back()->with('success','Owner created successfully.');
        }
        else{
            return redirect()->back()->with('error','Owner not created.');
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



}
