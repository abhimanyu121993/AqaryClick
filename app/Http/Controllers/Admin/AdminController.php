<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Cheque;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Electricity;
use App\Models\Invoice;
use App\Models\PermissionName;
use App\Models\Tenant;
use App\Models\Unit;
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
    protected $user_id = '';
    public function getUser()
    {
           if(Auth::user()->hasRole('Owner')){
              $this->user_id = Auth::user()->id;
          }
          else
          {
              $this->user_id = Auth::user()->created_by;
          }
    }
    public function dashboard()
    {
        
        $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
        $buildings=Building::count();
        $unit=Unit::count();
        $tenant=Tenant::count();
        $vacant=Unit::where('unit_status','vacant')->count() ;
        $tenant_not_sign=Contract::where('lessor_sign',null)->count();
        $totle_contract=Contract::all();
        $invoice=Invoice::all();
        $electricity=Electricity::count();
        $cheque=Cheque::where('cheque_status','Valid')->get();
        $bounce_cheque=Cheque::where('cheque_status','Bounced')->get();
        $expired_cheque=Cheque::where('cheque_status','Expired')->get();
        $postponed_cheque=Cheque::where('cheque_status','Postponed')->get();
        $cleared_cheque=Cheque::where('cheque_status','Cleared')->get();
        $security_cheque=Cheque::where('cheque_status','Security Cheque')->get();
        $cheque_reccord=Cheque::count();
        $overdue=Contract::where('overdue','>=',0)->count();
        $dueInvoice = Invoice::whereNotNull('due_amt')->orWhere('due_amt', '>', 0)->count();
        }
        else{

            $user_id = '';
            if (Auth::user()->hasRole('Owner')) {
                $user_id = Auth::user()->id;
            }
            else
            {
                $user_id=Auth::user()->created_by;
            }
            $buildings=Building::where('user_id',$user_id)->count();
            $electricity=Electricity::where('user_id',$user_id)->count();
            $unit=Unit::where('user_id',$user_id)->count();
            $totle_contract=Contract::where('user_id',$user_id)->get();
            $tenant=Tenant::where('user_id',$user_id)->count();
            $tenant_not_sign=Contract::where('user_id',$user_id)->where('lessor_sign',null)->count();

            $vacant=Unit::where('user_id',$user_id)->where('unit_status','vacant')->count() ;
            $cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Valid')->get();
            $bounce_cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Bounced')->get();
            $expired_cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Expired')->get();
            $postponed_cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Postponed')->get();
            $cleared_cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Cleared')->get();
            $security_cheque=Cheque::where('user_id',$user_id)->where('cheque_status','Security Cheque')->get();
            $invoice=Invoice::where('user_id',$user_id)->get();
            $cheque_reccord=Cheque::where('user_id',$user_id)->count();
            $overdue=Contract::where('user_id',$user_id)->where('overdue','>=',0)->count();
            $dueInvoice = Invoice::where('user_id', $this->user_id)->where(function ($query) {
                $query->whereNotNull('due_amt')->orWhere('due_amt', '>', 0);
            })->count();

        }
       
        return view('admin.dashboard',compact('overdue','cheque_reccord','invoice','vacant','totle_contract','cheque','bounce_cheque','expired_cheque','postponed_cheque','cleared_cheque','security_cheque','buildings','electricity','tenant','tenant_not_sign','unit','dueInvoice'));
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
