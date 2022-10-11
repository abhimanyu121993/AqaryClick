<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingStatus;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings=Building::all();
        $building_types=BuildingType::all();
        $building_statuses=BuildingStatus::all();
        return view('admin.building.register_building',compact('buildings', 'building_types', 'building_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings=Building::all();
        $building_types=BuildingType::all();
        $building_statuses=BuildingStatus::all();
        return view('admin.building.all_building',compact('buildings', 'building_types', 'building_statuses'));
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
       $data= BuildingType::create([
            'name' => $request->name
        ]);
        if($data){
        return redirect()->back()->with('success','Building Type has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Building Type not created.');
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
        $buildingedit=BuildingType::find($id);
        $buildings=BuildingType::all();
        return view('admin.building.buildingtype',compact('buildingedit','buildings'));
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
        $data=BuildingType::find($id)->update([
            'name' => $request->name
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Building Type has been Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Building Type not created.');
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
        $data=BuildingType::find($id);
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
