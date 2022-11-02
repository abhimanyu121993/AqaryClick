<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingType;
use App\Models\Unit;
use App\Models\UnitFeature;
use App\Models\UnitFloor;
use App\Models\UnitStatus;
use App\Models\UnitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=Building::all();
        $units2=UnitType::all();
        $units3=UnitStatus::all();
        $units4=UnitFloor::all();
        $units5=UnitFeature::all();
        return view('admin.unit.register_unit',compact('units','units2','units3','units4','units5'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units=Unit::all();
        return view('admin.unit.all_unit',compact('units'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'building_name'=>'required',
            'unit_no'=>'required',
            'unit_code'=>'required',
            'unit_type'=>'required',
            'unit_size'=>'required',
            'unit_floor'=>'required',
            'unit_feature'=>'required',
            'electric_no'=>'required',
            'water_no'=>'required',
            'intial_rent'=>'required',
            'actual_rent'=>'required',
            'unit_desc'=>'required',
            'unit_ref'=>'required',
            'revenue'=>'required',


        ]);
        $otherpic=[];
        if($request->hasFile('attachment'))
        {
            foreach($request->file('attachment') as $file)
            {
                $name='unit-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/unit_doc'),$name);
                $otherpic[]=$name;
            }
        }
       $data= Unit::create([
            'building_id' => $request->building_name,
            'unit_no'=>$request->unit_no,
            'unit_code'=>$request->unit_code,
            'unit_type'=>$request->unit_type,
            'unit_size'=>$request->unit_size,
            'unit_status'=>$request->unit_status,
            'unit_floor'=>$request->unit_floor,
            'unit_feature'=>$request->unit_feature,
            'electric_no'=>$request->electric_no,
            'water_no'=>$request->water_no,
            'intial_rent'=>$request->intial_rent,
            'actual_rent'=>$request->actual_rent,
            'unit_desc'=>$request->unit_desc,
            'unit_ref'=>$request->unit_ref,
            'revenue'=>$request->revenue,
            'attachment'=>json_encode($otherpic),
            'remark'=>$request->remark,



        ]);
        if($data){
        return redirect()->back()->with('success','Unit Registration has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Unit Registration not created.');
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
        $units=Building::all();
        $units2=UnitType::all();
        $units3=UnitStatus::all();
        $units4=UnitFloor::all();
        $units5=UnitFeature::all();
        $buildingedit=Unit::find($id);
        return view('admin.unit.register_unit',compact('units','units2','units3','units4','units5','buildingedit'));
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
            'building_name'=>'required',
            'unit_code'=>'required',
            'unit_no'=>'required',
            'unit_type'=>'required',
            'unit_size'=>'required',
            'unit_floor'=>'required',
            'unit_feature'=>'required',
            'electric_no'=>'required',
            'water_no'=>'required',
            'intial_rent'=>'required',
            'actual_rent'=>'required',
            'unit_desc'=>'required',
            'unit_ref'=>'required',
            'revenue'=>'required',
        ]);
        $otherpic=[];
        if($request->hasFile('file'))
        {
            foreach($request->file('file') as $file)
            {
                $name='unit-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/unit'),$name);
                $otherpic[]=$name;
            }
        }
       $data= Unit::find($id)->update([
            'building_id' => $request->building_name,
            'unit_no'=>$request->unit_no,
            'unit_code'=>$request->unit_code,
            'unit_type'=>$request->unit_type,
            'unit_size'=>$request->unit_size,
            'unit_status'=>$request->unit_status,
            'unit_floor'=>$request->unit_floor,
            'unit_feature'=>$request->unit_feature,
            'electric_no'=>$request->electric_no,
            'water_no'=>$request->water_no,
            'intial_rent'=>$request->intial_rent,
            'actual_rent'=>$request->actual_rent,
            'unit_desc'=>$request->unit_desc,
            'unit_ref'=>$request->unit_ref,
            'revenue'=>$request->revenue,
            'attachment'=>json_encode($otherpic),
            'remark'=>$request->remark,



        ]);
        if($data){
        return redirect()->back()->with('success','Unit Registration has been Updated successfully.');
        }
        else{
            return redirect()->back()->with('error','Unit Registration not updated.');
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data=Unit::find($id);
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
