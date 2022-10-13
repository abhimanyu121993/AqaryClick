<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract=Contract::all();
        return view('admin.contract.contract_registration',compact('contract'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
       $data= Contract::create([
            'tenant_type' => $request->tenant_type,
            'document_type'=>$request->document_type,
            'tenant_nationality'=>$request->tenant_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'lessor'=>$request->lessor,
        ]);
        if($data){
        return redirect()->back()->with('success','Contract Registration has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Contract Registration not created.');
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
        $contractedit=Contract::find($id);
        $contract=Contract::all();
        return view('admin.contract.contract_registration',compact('contract','contractedit'));
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

        ]);
        $data=Contract::find($id)->update([
            'tenant_type' => $request->tenant_type,
            'document_type'=>$request->document_type,
            'tenant_nationality'=>$request->tenant_nationality,
            'sponsor_id'=>$request->sponsor_id,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_mobile'=>$request->sponsor_mobile,
            'lessor'=>$request->lessor,
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Contract Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Contract not created.');
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
        $data=Contract::find($id);
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
