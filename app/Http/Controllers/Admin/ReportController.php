<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report(){
        $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
        $building=Building::all();
        }
        else{
            $building=Building::where('user_id',Auth::user()->id)->get();

        }        return view('admin.settings.report',compact('building'));
    }
}
