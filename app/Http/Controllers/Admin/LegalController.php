<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Legal;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function index()
    { 
        $this->getUser();
        if(Auth::user()->hasRole('superadmin')){
        $legalDetail = Legal::all();
        }
        else{
        $legalDetail = Legal::where('user_id',$this->user_id)->get();

        }
        // $data = Legal::find($id);
        return view('admin.legal.register', compact('legalDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $legalDetail = Legal::all();
        return view('admin.legal.all_legal', compact('legalDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data=Legal::find($id);
         return response()->json(['data'=>$data]);
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
        // 
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
        $data=Legal::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }    
    }
    public function legalContract($contract_id){
        $res=Contract::with('tenantDetails')->where('id',$contract_id)->first();
        $unit_no=Tenant::where('id',$res->tenant_name)->first()->unit_no;
        $unit_ref=Unit::where('id',$unit_no)->first()->unit_ref; 
        $last_payment=Invoice::where('contract_id',$contract_id)->latest()->first()->invoice_end_period??'No Record';    
        return response()->json(array('res'=>$res,'unit_ref'=>$unit_ref,'last_payment'=>$last_payment));
        
}

public function updateLegal(Request $request){

    $request->validate([]);
    // $otherpic=Legal::find($id)->file??[];
    $otherpic = [];
    if ($request->hasFile('attachment_file')) {
        foreach ($request->file('attachment_file') as $file) {
            $name = 'legal-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
            $file->move(public_path('upload/legal_doc'), $name);
            $otherpic[] = $name;
        }
    }
    if (is_array($otherpic) and count($otherpic) > 0) {
        Legal::find($request->id)->update(['file' => json_encode($otherpic)]);
    }
    $data = Legal::find($request->id)->update([
        'status' => $request->status,
        'remark' => $request->remark,
    ]);
    if ($data) {
        return redirect()->back()->with('success', 'Legal has been Updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Legal not Updated.');
    }

}

public function contractDetails($tenant_id)
{
    $this->getUser();

  if(Auth::user()->hasRole('superadmin')){
    $res = Contract::where('tenant_name', $tenant_id)->get();
}
  else{
    $res = Contract::where('user_id',Auth::$this->user_id)->where('tenant_name', $tenant_id)->get();
  }
    $html = ' <option value="" selected hidden disabled>--Select Contract--</option>';
    foreach ($res as $r) {
        $html .= '<option value="' . $r->id . '">' . $r->contract_code . ' (' ;
        $html .= isset($r->tenantDetails->buildingDetails)?$r->tenantDetails->buildingDetails->name:'No Bilding Found' ;
        $html .= ')' . '</option>';
    }
    return response()->json($html);
}
public function tenantBuildingLegal($building_id)
{
    $this->getUser();

    if ($building_id == 'all') {
        if(Auth::user()->hasRole('superadmin')){
            $res = Tenant::all();
        }
        else{
            $res = Tenant::where('user_id',$this->user_id)->get();
        }

        $html = ' <option value=""selected hidden disabled> --Select Tenant--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
        }
    } else {
        if(Auth::user()->hasRole('superadmin')){
            $res = Tenant::where('building_name', $building_id)->get();
        }
        else{
            $res = Tenant::where('user_id',$this->user_id)->where('building_name', $building_id)->get();
        }

        $html = ' <option value=""selected hidden disabled>--Select Tenant--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->tenant_english_name . '</option>';
        }
    }
    return response()->json($html);
}

public function contractLegalDetails($tenant_id)
    {
        $this->getUser();
        $role=Auth::user()->roles[0]->name;
      if($role=='superadmin'){
        $res = Contract::where('tenant_name', $tenant_id)->get();
    }
      else{
        $res = Contract::where('user_id',$this->user_id)->where('tenant_name', $tenant_id)->get();
      }
        $html = ' <option value="" selected hidden disabled>--Select Contract--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->contract_code . ' (' ;
            $html .= isset($r->tenantDetails->buildingDetails)?$r->tenantDetails->buildingDetails->name:'No Bilding Found' ;
            $html .= ')' . '</option>';
        }
        return response()->json($html);
    }
public function legalReport(){
    $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $building = Building::all();
        } else {
            $building = Building::where('user_id',$this->user_id)->get();
        }
    return view('admin.legal.legal_report',compact('building'));
}

public function legalDetails($contract_id)
    {
        $this->getUser();

        if (Auth::user()->hasRole('superadmin')){
            $res = Contract::where('id', $contract_id)->where('overdue','>=',90)->first();
            if($res){
                $msg="Legal Case on this contract";

            }
            else{
                $msg="This Contract Have No any Legal Record, Its Already In good Conditions.";
            }
        
        } else {
            $res = Contract::where('user_id',$this->user_id)->where('id', $contract_id)->where('overdue','>=',90)->first();
            if($res){
                $msg="Legal Case on this contract";

            }
            else{
                $msg="This Contract Have No any Legal Record, Its Already In good Conditions";
            }
        }
        return response()->json($msg);
    }



}
