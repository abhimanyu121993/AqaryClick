<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.broker.broker_registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $units=Broker::all();
        return view('admin.broker.all_broker',compact('units'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',

        ]);
        $nUser= User::create([
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email'=>$request->email,
            'phone' =>$request->tenant_primary_mobile,
            'password'=>Hash::make(123456),
        ]);
        $nUser->assignRole('Broker');
       $data= Broker::create([
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,

        ]);
        if($data){
        return redirect()->back()->with('success','Broker has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Broker not created.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $broker=Broker::find($id);
        $units=Broker::all();
        return view('admin.broker.broker_registration',compact('broker','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);
        $data=Broker::find($id)->update([
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,

        ]);
        if($data)
        {
        return redirect()->back()->with('success','Broker Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Broker not Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data=Broker::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }
}
