<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cheque;
use App\Models\Invoice;
use App\Models\PermissionName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.analytic_dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');

    }

}
