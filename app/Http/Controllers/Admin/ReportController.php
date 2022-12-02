<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Tenant;
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

    public function tenantUnitBuilding($building_id)
    {
        if ($building_id == 'all') {
            $role=Auth::user()->roles[0]->name;
            if($role=='superadmin'){
                $res = Tenant::with('unitTypeInfo')->get();
            }
            else{
                $res = Tenant::where('user_id',Auth::user()->id)->get();
            }
            
            $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name .'('.$r->unit_type.')'. '</option>';
            }
        } else {
            $role=Auth::user()->roles[0]->name;
            if($role=='superadmin'){
                $res = Tenant::where('building_name', $building_id)->get();
            }
            else{
                $res = Tenant::where('user_id',Auth::user()->id)->where('building_name', $building_id)->get();
            }
            
            $html = ' <option value=""selected hidden disabled>--Select Tenant--</option>';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name .'('.$r->unit_type.')'. '</option>';
            }
        }
        return response()->json($html);
    }
}
