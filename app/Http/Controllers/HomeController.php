<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\Building;
use App\Models\CompanyDocument;
use App\Models\Building;
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
        // $request->validate([
       
        // ]);
        if($request->password_company_ind==null){
            $nUser= User::create([
                'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email_company_ind,
            'phone' => $request->phone,
            'password'=>Hash::make(123456),
            ]);
        }
        else{
            $nUser= User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email'=>$request->email_company,
                'phone' => $request->phone,
                'password'=>Hash::make($request->passwordy_company_ind)
            ]);
        }
        $nUser->assignRole('Owner');
       $user= Owner::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'email'=>$request->email_company,
            'phone' => $request->phone,
            'customer_code' => $request->customer_code,
            'customer_type'=>$request->customer_type
        ]);
        $bankdata=BankDetail::create([
            'user_id'=>$user->id,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'ifsc'=>$request->ifsc,
            'swift'=>$request->swift,
            'iban_no'=>$request->iban_no
        ]);
        if($bankdata)
        {
            return redirect()->back()->with('success','Indivisual Company Created.');
        }
        else
        {
            return redirect()->back();

        }
    }

    

}
