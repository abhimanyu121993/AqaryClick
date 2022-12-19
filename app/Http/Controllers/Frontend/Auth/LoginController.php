<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CustomerRegister;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
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

            if(Auth::user()->hasRole('Visitor')){
                Alert::warning('You Are Visitor', 'Purchase Any One Plan to Become Our Customer');
                return redirect()->route('home.plans');
            }
            else {
               
                return redirect()->route('admin.dashboard');
            }
        }
        else
        {
            Alert::error('OPP\'s', 'Invalid Creadential');
            return redirect()->back();
        }
   }

   //forget Passwword
   public function showForgetPasswordForm()
   {
      return view('frontend.auth.forgetpassword');
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

       Alert::alert()->success('Successfully','We have e-mailed your password reset link!');
       return back();
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

       return redirect(route('home.login'))->with('message', 'Your password has been changed!');
   }

   public function logout()
   {
        Auth::logout();
        return redirect()->route('home.');
   }


   public function registerIndex(){
    return view('frontend.auth.register');
   }
   
   public function registerStore(Request $request){
    

    $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'mobile'=>'required',
        'email'=>'required|unique:users,email|unique:customers,email',
        'address'=>'required',
        
    ]);

   

    $customer=Customer::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'mobile'=>$request->mobile,
        'email'=>$request->email,
        'address'=>$request->address,
    ]);
        $password = 'Aqary@' . time();
        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            "phone"=>$request->mobile,
            'address'=>$request->address,
            'status'=>false,
            'password'=>Hash::make($password),
        ]);
        $user->assignRole('Visitor');
        // return $user->getRoleNames();
        Mail::to($request->email)->send(new CustomerRegister($request->email,$password));
    Alert::alert()->success('Registration Done','Credentials has been sent on your email ! ');
    return Redirect()->back();
    
   }
}
