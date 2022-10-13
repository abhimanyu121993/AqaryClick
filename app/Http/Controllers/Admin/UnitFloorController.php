<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UnitFloor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitFloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=UnitFloor::all();
        return view('admin.unit.unit_floor',compact('units'));
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
       $data= UnitFloor::create([
            'name' => $request->name
        ]);
        if($data){
        return redirect()->back()->with('success','Unit Floor has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Unit Floor not created.');
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
        $unitfloor=UnitFloor::find($id);
        $units=UnitFloor::all();
        return view('admin.unit.unit_floor',compact('unitfloor','units'));
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
        $data=UnitFloor::find($id)->update([
            'name' => $request->name
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Unit Floor Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Unit Floor not created.');
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
        $data=UnitFloor::find($id);
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
