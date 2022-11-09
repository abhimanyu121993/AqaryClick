<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UnitStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=UnitStatus::all();
        return view('admin.unit.unit_status',compact('units'));
        
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
            'name' => 'required',
        ]);
       $data= UnitStatus::create([
            'name' => strtolower($request->name)
        ]);
        if($data){
        return redirect()->back()->with('success','Unit Status has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Unit Status not created.');
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
        $unitstatus=UnitStatus::find($id);
        $units=UnitStatus::all();
        return view('admin.unit.unit_status',compact('unitstatus','units'));
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
            'name' => 'required',
        ]);
        $data=UnitStatus::find($id)->update([
            'name' => strtolower($request->name)
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Unit Status Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Unit Status not created.');
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
        $data=UnitStatus::find($id);
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
