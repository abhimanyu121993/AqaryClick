<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Membership extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getActiveMembershipAttribute()
    {
       
        if(Auth::user()->membership_end){
            if(Carbon::Now()->lte(Carbon::parse(Auth::user()->membership_end))){
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
