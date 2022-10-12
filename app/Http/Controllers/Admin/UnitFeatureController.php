<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UnitFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=UnitFeature::all();
        return view('admin.unit.unit_feature',compact('units'));
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
       $data= UnitFeature::create([
            'name' => $request->name
        ]);
        if($data){
        return redirect()->back()->with('success','Unit Feature has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Unit Feature not created.');
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
        $unitfeat=UnitFeature::find($id);
        $units=UnitFeature::all();
        return view('admin.unit.unit_feature',compact('unitfeat','units'));
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
        $data=UnitFeature::find($id)->update([
            'name' => $request->name
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Unit Feature Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Unit Type not created.');
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
        $data=UnitFeature::find($id);
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

