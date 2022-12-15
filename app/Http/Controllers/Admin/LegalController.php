<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Legal;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $legalDetail = Legal::all();
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

        }
