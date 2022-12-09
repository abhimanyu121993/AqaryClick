<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AlertNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    
    public function sendNotification(){

        // $user = User::find(43);
        // $name= $user->name;
        
        
        // $details = [ 

        //     'body' => 'You received an new notification from AqaryClick.com', 

        //     'title'=>$name, 
        // ]; 

   

        // Notification::send($user, new AlertNotification($details)); 

        
    }
}
