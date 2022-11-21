<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\Building;
use App\Models\CompanyDocument;
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
        return view('welcome', compact('nationality','unit','nation','building'));
    }

    public function about()
    {
        return view('home.about');
    }
    public function properties()
    {
        return view('home.properties');
    }

    public function propertie_details()
    {
        return view('home.propertie-details');
    }

    public function contect()
    {
        return view('home.contect');
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
