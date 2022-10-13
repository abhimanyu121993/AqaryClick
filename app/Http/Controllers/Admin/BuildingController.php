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
        $mainpic='';
        $otherpic=[];
        if($request->hasFile('building_pic')){
            $mainpic='build-'.time().'-'.rand(0,99).'.'.$request->building_pic->extension();
            $request->building_pic->move(public_path('upload/building'),$mainpic);
        }

        if($request->hasFile('building_file'))
        {
            foreach($request->file('building_file') as $file)
            {
                $name='build-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/building_doc'),$name);
                $otherpic[]=$name;
            }
        }
       $data= Building::create([
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name'=>$request->owner_name,
            'lessor_name'=>$request->lessor_name,
            'person_incharge'=>$request->incharge_name,
            'total_unit'=>$request->total_unit,
            'building_type'=>$request->building_type,
            'construction_date'=>$request->cdate,
            'person_name'=>$request->person_name,
            'person_mobile'=>$request->person_mobile,
            'building_receive_date'=>$request->rdate,
            'space'=>$request->space,
            'location'=>$request->building_location,
            'contract_no'=>$request->contract_no,
            'country'=>$request->country,
            'city'=>$request->city,
            'state'=>$request->state,
            'area'=>$request->area,
            'pincode'=>$request->pincode,
            'building_pic'=>$request->building_pic,
            'file' =>$request->building_file,
            'remark'=>$request->remark,           
        ]);
        if($data){
        return redirect()->back()->with('success','Building Registration has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Building Registration not created.');
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
