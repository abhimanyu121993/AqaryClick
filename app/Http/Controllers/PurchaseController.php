<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseController extends Controller
{
    
    public function membership($id)
    {
        $user = Auth::user();
        $membership = Membership::find($id);
        if($membership){
            if ($membership->active_membership) {
                Alert::warning('Hey', 'You are already member');
                return redirect()->back();
            }
            else
            {
                if ($membership->price > 0) {
                    return 'purchase Code';
                    $user->syncRoles('Owner');

                } else {
                    
                    $user->update([
                        'membership_id'=>$membership->id,
                        'membership_taken'=>Carbon::now(),
                        'membership_end'=>Carbon::now()->addMonths($membership->validity),
                        'status'=>true
                    ]);
                    $user->syncRoles('Owner');
                    Alert::success('Congratualtion', 'Your Free Membership is activated Successfully');
                    return redirect()->back();
                }
            }
        }
        else
        {
            Alert::warning('OPP\'s', 'Membership Not Found Or Not Activated');
            return redirect()->back();
        }
    }
}
