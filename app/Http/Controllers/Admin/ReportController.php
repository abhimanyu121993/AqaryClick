<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function report(){
        $tenantStatus=Tenant::all();
        $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
        $building=Building::all();
        }
        else{
            $building=Building::where('user_id',Auth::user()->id)->get();

        }        return view('admin.settings.report',compact('building','tenantStatus'));
    }

    public function tenantUnitBuilding($building_id)
    {
        if ($building_id == 'all') {
            $role=Auth::user()->roles[0]->name;
            if($role=='superadmin'){
                $res = Tenant::with('unittypeinfo')->get();
            }
            else{
                $res = Tenant::with('unittypeinfo')->where('user_id',Auth::user()->id)->get();
            }
         
        } else {
            $role=Auth::user()->roles[0]->name;
            if($role=='superadmin'){
                $res = Tenant::with('unittypeinfo')->where('building_name', $building_id)->get();
            }
            else{
                $res = Tenant::with('unittypeinfo')->where('user_id',Auth::user()->id)->where('building_name', $building_id)->get();
            }
            
        }
        $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name .'(';
            $html .=$r->unittypeinfo->name??'';
            $html .=')'. '</option>';
        }
        return response()->json($html);
    }
   public function getFileDownload($path){
        $filePath = public_path('upload/tenent/'.$path);
       return Response::download($filePath);
    }

public function masterReport($tenant_id){
$tenant=Tenant::find($tenant_id); 
$contract=Contract::where('tenant_name',$tenant_id)->get();  
$invoice=Invoice::where('tenant_id',$tenant_id)->get();  

    return view('admin.settings.master_report',compact('tenant','contract','invoice'));
}

public function contractReport(Request $req)
{
        $req->validate([
            'owner_id' => 'required|numeric',
            'type' => 'required|in:ccr,lpcr,recc'
        ]);
        $user=Customer::find($req->owner_id)->user;
        if($req->type=='ccr'){
            $contracts=Contract::where('user_id', $user->id)->get();
        }
        else if($req->type=='lpcr'){
            $contracts=Contract::where('user_id', $user->id)->where('overdue','>',0)->get();

        }
        else if($req->type=='recc'){
            $contracts=Contract::where('user_id', $user->id)->where('expire',true)->get();
        }

        return $contracts;
}

public function buildingReport(Request $req){
        $req->validate([
            'owner_id'=>'required|numeric',
            'type'=>'required|in:a,na'
        ]);

        if($req->type=='a'){
            $buildings = Building::where('user_id',$req->owner_id)->where('status','active')->get();
        }
        else if($req->type=='na'){
            $buildings = Building::where('user_id',$req->owner_id)->where('status','inactive')->get();  
        }
        return $buildings;

}


}
