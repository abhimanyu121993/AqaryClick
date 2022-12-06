<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AlertNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    
    public function sendNotification(){

        $user = User::find(43);
        $name= $user->name;
        $username = $user->email;
        
        
        $details = [ 

            'body' => 'You received an new notification from AqaryClick.com', 

            'name'=>$name, 

            'username'=>$username,

            'click'=>'Click On',

            'url'=>url('/'),

            'thankyou'=>'Thank you', 
        ]; 

   

        Notification::send($user, new AlertNotification($details)); 
    }
}
