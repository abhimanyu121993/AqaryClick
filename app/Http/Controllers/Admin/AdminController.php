<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cheque;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PermissionName;
use App\Models\UnitStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function dashboard()

    {

        $cheque=Cheque::where('cheque_status','Valid')->get();
        $bounce_cheque=Cheque::where('cheque_status','Bounced')->get();
        $expired_cheque=Cheque::where('cheque_status','Expired')->get();
        $postponed_cheque=Cheque::where('cheque_status','Postponed')->get();
        $cleared_cheque=Cheque::where('cheque_status','Cleared')->get();
        $security_cheque=Cheque::where('cheque_status','Security Cheque')->get();
        return view('admin.dashboard',compact('cheque','bounce_cheque','expired_cheque','postponed_cheque','cleared_cheque','security_cheque'));
    }
    public function Analyticdashboard()
    {
        $active_user=Customer::where('is_active',true)->count();
        $inactive_user=Customer::where('is_active',false)->count();
        $userReport[0]=['user type','count'];
        $userReport[1]=['Active',$active_user];
        $userReport[2]=['Inactive',$inactive_user];
        $unitReport[0]=['Unit','Count'];
        $cheque=Cheque::select('cheque_status',DB::raw('count(*) as total'))->groupBy('cheque_status')->pluck('total','cheque_status');
        $chequeReport[0]=['Type','Count'];
        foreach($cheque as $key=>$v){
            array_push($chequeReport,[$key,$v]);
        }

        $res= UnitStatus::withCount('unitStatusDetails')->get()->map(function($item,$index){
            return [
                $item['name'],$item['unit_status_details_count']
            ];
        });

        foreach($res as $r){
            array_push($unitReport,$r);
        }
        return view('admin.analytic_dashboard',compact('userReport','unitReport','chequeReport'));
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');

    }

}
