<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
   public function index()
   {
        return view('frontend.auth.login');
        
   }

   public function login(Request $req)
   {
        
        $req->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required|min:6|string'
        ]);

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password],$req->remeber?true:false)) {
            return redirect()->route('admin.dashboard');
        }
   }

   //forget Passwword
   public function showForgetPasswordForm()
   {
      return view('frontend.auth.forgetPassword');
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
   public function submitForgetPasswordForm(Request $request)
   {
       
       $request->validate([
           'email' => 'required|email|exists:users',
       ]);

       $token = Str::random(64);

       DB::table('password_resets')->insert([
           'email' => $request->email, 
           'token' => $token, 
           'created_at' => Carbon::now()
         ]);

       Mail::send('frontend.email.forgetPassword', ['token' => $token], function($message) use($request){
           $message->to($request->email);
           $message->subject('Reset Password');
       });

       return back()->with('message', 'We have e-mailed your password reset link!');
   }
   /**
    * Write code on Method
    *
    * @return response()
    */
   public function showResetPasswordForm($token) { 
      return view('frontend.auth.forgetPasswordLink', ['token' => $token]);
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
   public function submitResetPasswordForm(Request $request)
   {
       $request->validate([
           'password' => 'required|string|min:6',
           'password_confirmation' => 'required|same:password'
       ]);

       $updatePassword = DB::table('password_resets')
                           ->where([
                             'token' => $request->token
                           ])
                           ->first();

       if(!$updatePassword){
           return back()->withInput()->with('error', 'Invalid token!');
       }

       $user = User::where('email', $updatePassword->email)
                   ->update(['password' => Hash::make($request->password)]);

       DB::table('password_resets')->where(['email'=> $request->email])->delete();

       return redirect('/login')->with('message', 'Your password has been changed!');
   }

   public function logout()
   {
        Auth::logout();
        return redirect()->route('home.');
   }
}
