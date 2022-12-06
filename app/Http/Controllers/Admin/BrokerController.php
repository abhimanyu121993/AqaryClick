<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Building;
use App\Models\Unit;
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
     *by
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
       $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'mobile' => 'required',
            'email' => 'required',

        ]);
       $data= Broker::create([
            'broker_agent' => $request->broker_agent,
            'broker_name' => $request->broker_fname,
            'broker_id' => $request->broker_id,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'commission' => $request->commission,
            'broker_type' => $request->broker_type,
            'property_type' => $request->property_type,
            'unit_id' => $request->unit_ref,
            'building_id' => $request->building_name,
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
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'mobile' => 'required',
            'email' => 'required',
        ]);
        $data=Broker::find($id)->update([
            'broker_agent' => $request->broker_agent,
            'broker_name' => $request->broker_fname,
            'broker_id' => $request->broker_id,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'commission' => $request->commission,
            'broker_type' => $request->broker_type,
            'property_type' => $request->property_type,
            'unit_id' => $request->unit_ref,
            'building_id' => $request->building_name,

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
    public function fetchBrokerUnitDetails(){
        $res=Unit::all();
        $html=' <option value="">--Select Unit--</option>';

        foreach($res as $r){
            $html .='<option value="'.$r->id.'">'.$r->unit_ref.'</option>';
        }
    
        return response()->json($html);
        }

        public function fetchBrokerBuildingDetails(){
                           $res=Building::all();
                $html=' <option value="">--Select Building--</option>';
    
                foreach($res as $r){
                    $html .='<option value="'.$r->id.'">'.$r->name.'</option>';
            }
            return response()->json($html);
    
}
}
