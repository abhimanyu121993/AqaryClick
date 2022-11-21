<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\ContactUs;
use App\Models\Nationality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nationality = Nationality::get();
        $buildings = Building::get();
        // dd($buildings);
        return view('welcome', compact('nationality', 'buildings'));
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


}
