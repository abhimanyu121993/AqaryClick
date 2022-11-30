<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\Building;
use App\Models\CompanyDocument;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\Nationality;
use App\Models\Owner;
use App\Models\OwnerCompany;
use App\Models\UnitType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Membership;

class HomeController extends Controller
{
    public function index()
    {
        // $res=Currency::convert()->from('SAR')->to('INR')->amount(1)->get();
        // return $res;
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
        $membership=Membership::get();
        return view('home.registration', compact('nationality','membership'));
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
        // dd($request);
        $request->validate([
            'first_name' => 'required',
            "email" => "required",
            'password'=>'required',
         ]);
        if($request->password==null){
            $nUser= User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=>$request->email,
            'phone' => $request->phone,
            'password'=>Hash::make(123456),
            ]);
        }
        else{
            $nUser= User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email'=>$request->email,
                'phone' => $request->phone,
                'password'=>Hash::make($request->password),
                ]);
        }
        $nUser->assignRole('Owner');
         $user= Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'email'=>$request->email,
            'mobile' => $request->phone,
        ]);   
        if($user){
        return redirect()->back()->with('success','Your Registration has been successfully.');
        }
        else{
            return redirect()->back()->with('error','Something went wrong!please try again.');
        }
    }



}
