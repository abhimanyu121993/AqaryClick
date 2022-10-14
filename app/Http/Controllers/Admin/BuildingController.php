<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Building;
use App\Models\BuildingStatus;
use App\Models\BuildingType;
use App\Models\City;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

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
        $cityDetail=City::all();
        $countryDetail=Nationality::all();
        $zoneDetail=Area::all();
        return view('admin.building.register_building',compact('buildings', 'building_types', 'building_statuses','cityDetail','countryDetail','zoneDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings=Building::all();
        return view('admin.building.all_building',compact('buildings'));
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
            'building_code'=>'required',
            'owner_name'=>'required',
            'lessor_name'=>'required',
            
        ]);
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
            'ownership_type'=>$request->ownership_type,
            'ownership_no'=>$request->ownership_no,
            'contract_exp'=>$request->contract_exp,
            'person_job'=>$request->person_job,
            'building_no'=>$request->building_no,
            'building_age'=>$request->building_age,
            'land_size_foot'=>$request->land_size_foot,
            'price_foot'=>$request->price_foot,
            'total_land'=>$request->total_land,
            'landsize_meter'=>$request->landsize_meter,
            'cost_building'=>$request->cost_building,
            'building_value'=>$request->building_value,
            'monthly_income'=>$request->monthly_income,
            'annual_income'=>$request->annual_income,
            'payback'=>$request->payback,
            'property_vlaue'=>$request->property_vlaue,
            'zone_no'=>$request->zone_no,
            'street_no'=>$request->street_no,
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
            'file' =>json_encode($otherpic),
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
        $buildingedit=Building::find($id);
        $building_types=BuildingType::all();
        $building_statuses=BuildingStatus::all();
        $buildings=Building::all();
        return view('admin.building.register_building',compact('buildingedit','buildings','building_types','building_statuses'));
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
            'building_code'=>'required',
            'owner_name'=>'required',
            'lessor_name'=>'required',
            
        ]);
        $mainpic='';
        $otherpic=[];
        if($request->hasFile('building_pic')){
            $mainpic='build-'.time().'-'.rand(0,99).'.'.$request->building_pic->extension();
            $request->building_pic->move(public_path('upload/building'),$mainpic);
            $oldpic = Building::find($id)->pluck('file')[0];
            File::delete(public_path('upload/building/' . $oldpic));
            Building::find($id)->update(['building_pic' => $mainpic]);
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
       $data= Building::find($id)->update([
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name'=>$request->owner_name,
            'lessor_name'=>$request->lessor_name,
            'person_incharge'=>$request->incharge_name,
            'total_unit'=>$request->total_unit,
            'building_no'=>$request->building_no,
            'land_size_foot'=>$request->land_size_foot,
            'price_foot'=>$request->price_foot,
            'total_land'=>$request->total_land,
            'landsize_meter'=>$request->landsize_meter,
            'cost_building'=>$request->cost_building,
            'building_value'=>$request->building_value,
            'monthly_income'=>$request->monthly_income,
            'annual_income'=>$request->annual_income,
            'payback'=>$request->payback,
            'ownership_type'=>$request->ownership_type,
            'ownership_no'=>$request->ownership_no,
            'contract_exp'=>$request->contract_exp,
            'property_vlaue'=>$request->property_vlaue,
            'zone_no'=>$request->zone_no,
            'building_type'=>$request->building_type,
            'construction_date'=>$request->cdate,
            'person_job'=>$request->person_job,
            'street_no'=>$request->street_no,
            'building_age'=>$request->building_age,
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
            'file' =>json_encode($otherpic),
            'remark'=>$request->remark,           
        ]);
        if($data){
        return redirect()->back()->with('success','Building Registration has been Updated successfully.');
        }
        else{
            return redirect()->back()->with('error','Building Registration not Updated.');
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
        $data=Building::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }

public function fetchZone($city_id){

$res=Area::where('city_id',$city_id)->get();
$html='';
foreach($res as $r){
    $html .='<option value="'.$r->name.'">'.$r->name.'</option>';
}
return response()->json($html);
}
}
