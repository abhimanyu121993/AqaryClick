<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
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


}
