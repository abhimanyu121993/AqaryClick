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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

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
        $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
        $buildings=Building::all();
        }
        else{
            $buildings=Building::where('user_id',Auth::user()->id)->get();

        }

        return view('admin.building.all_building',compact('buildings'));
    }

    public function get_buildings(Request $req){
        $role=Auth::user()->roles[0]->name;
        $query=Building::query()->with(['nationality','cityDetails']);
        if($role=='superadmin'){
        }
        else{
            $query->where('user_id',Auth::user()->id);

        }
        $buildings=$query->get();
        //  dd($buildings);
        // if ($req->ajax()) {
            return DataTables::of($buildings)->addIndexColumn()
            ->addColumn('image',function($raw){
                $imgtag="<img src='".asset("upload/building/".$raw->building_pic)."' class='me-75 bg-light-danger' style='height:35px;width:35px;'>";
                return $imgtag;
            })
            ->addColumn('document',function($doc){
                $bid=Crypt::encrypt($doc->id);
            $do='<a href="';
            $do .=route('admin.document', $bid);
            $do .='">View</a>';
            return $do;
            })
            ->addColumn('action',function($doc){
                $d='  <div class="dropdown">
                <a href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-more-2-fill"></i>
                </a>';
                $bid=Crypt::encrypt($doc->id);
                $d .='<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';

                    if(Auth::user()->hasPermissionTo('Building_edit'))
                    {
                    $d .='<li><a class="dropdown-item" href="';
                    $d .= route('admin.register_building.edit', $bid);
                    $d .='">Edit</a>
                        </li>';
                    }
                    if(Auth::user()->hasPermissionTo('Building_delete'))
                    {
                        $d .='
                        <li><a class="dropdown-item" href="#"';
                        $d .='
                                onclick="event.preventDefault();document.getElementById(\'delete-form-{{ $bid }}\').submit();">';
                        $d .="Delete</a>
                        </li>";
                    }
                    $d .='
                    <form id="delete-form-{{ $bid }}"
                        action="';
                        $d .= route('admin.register_building.destroy', $bid);
                        $d .='" method="post" style="display: none;">';

                        // @method('DELETE')
                      $d .=' <input type="hidden" name="_token" value="'.csrf_token().'">';
                    $d .='</form>
                </ul>
            </div>';
            return $d;
            })
            ->rawColumns(['image','document','action'])
            ->make(true);
        // }
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
            'building_name'=>'required',
            'building_type'=>'required',
            'status'=>'required',
            'ownership_type'=>'required',
            'pincode'=>'required',
            'owner_name'=>'required',
            'lessor_name'=>'required',
            'country'=>'required',
            'city'=>'required',
            'zone_name'=>'required',
            'building_no'=>'required',
            'street_no'=>'required',
            'zone_no'=>'required',
            'construction_date'=>'required',
            'building_age'=>'required',
            'building_status'=>'required',
            'built_up_area'=>'required',
            'cost_building'=>'required',
            'building_value'=>'required',
            'landsize_meter'=>'required',
            'land_size_foot'=>'required',
            'price_foot'=>'required',
            'total_land'=>'required',
            'monthly_income'=>'required',
            'annual_income'=>'required',
            'payback'=>'required',
            'property_vlaue'=>'required',
            'incharge_name'=>'required',
            'person_job'=>'required',
            'person_mobile'=>'required',
            'building_receive_date'=>'required',




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
            'user_id' => Auth::user()->id,
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name'=>$request->owner_name,
            'lessor_name'=>$request->lessor_name,
            'person_incharge'=>$request->incharge_name,
            'total_unit'=>$request->total_unit,
            'building_type'=>$request->building_type,
            'construction_date'=>$request->construction_date,
            'ownership_type'=>$request->ownership_type,
            'ownership_no'=>$request->ownership_no,
            'contract_exp'=>$request->contract_exp,
            'person_job'=>$request->person_job,
            'building_no'=>$request->building_no,
            'building_age'=>$request->building_age,
            'building_desc'=>$request->building_desc,
            'building_status'=>$request->building_status,
            'appraise_date'=>$request->appraise_date,
            'land_size_foot'=>$request->land_size_foot,
            'price_foot'=>$request->price_foot,
            'total_land'=>$request->total_land,
            'status'=>$request->building_status,
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
            'building_receive_date'=>$request->building_receive_date,
            'space'=>$request->built_up_area,
            'location'=>$request->building_location,
            'contract_no'=>$request->contract_no,
            'country'=>$request->country,
            'city'=>$request->city,
            'state'=>$request->state,
            'area'=>$request->zone_name,
            'pincode'=>$request->pincode,
            'building_pic'=>$mainpic,
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
        $countryDetail=Nationality::all();
        return view('admin.building.register_building',compact('buildingedit','buildings','building_types','building_statuses','countryDetail'));
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
        dd($request);
        $request->validate([

            'building_code'=>'required',
            'building_name'=>'required',
            'building_type'=>'required',
            'status'=>'required',
            'ownership_type'=>'required',
            'pincode'=>'required',
            'owner_name'=>'required',
            'lessor_name'=>'required',
            'country'=>'required',
            'city'=>'required',
            'zone_name'=>'required',
            'building_no'=>'required',
            'street_no'=>'required',
            'zone_no'=>'required',
            'construction_date'=>'required',
            'building_age'=>'required',
            'building_status'=>'required',
            'built_up_area'=>'required',
            'cost_building'=>'required',
            'building_value'=>'required',
            'landsize_meter'=>'required',
            'land_size_foot'=>'required',
            'price_foot'=>'required',
            'total_land'=>'required',
            'monthly_income'=>'required',
            'annual_income'=>'required',
            'payback'=>'required',
            'property_vlaue'=>'required',
            'incharge_name'=>'required',
            'person_job'=>'required',
            'person_mobile'=>'required',
            'building_receive_date'=>'required',

        ]);

        $mainpic=Building::find($id)->building_pic??'';
        $otherpic=Building::find($id)->building_file??[];
        if($request->hasFile('building_pic')){
            $mainpic='build-'.time().'-'.rand(0,99).'.'.$request->building_pic->extension();
            $request->building_pic->move(public_path('upload/building'),$mainpic);
            $oldpic = Building::find($id)->pluck('building_pic')[0];
            File::delete(public_path('upload/building/' . $oldpic));
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
        if(count($otherpic)>0)
                 {
                    Building::find($id)->update(['file'=>json_encode($otherpic)]);

                 }
       $data= Building::find($id)->update([
            'user_id' => Auth::user()->id,
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name'=>$request->owner_name,
            'lessor_name'=>$request->lessor_name,
            'person_incharge'=>$request->incharge_name,
            'total_unit'=>$request->total_unit,
            'building_no'=>$request->building_no,
            'status'=>$request->building_status,
            'land_size_foot'=>$request->land_size_foot,
            'price_foot'=>$request->price_foot,
            'total_land'=>$request->total_land,
            'landsize_meter'=>$request->landsize_meter,
            'cost_building'=>$request->cost_building,
            'building_value'=>$request->building_value,
            'building_desc'=>$request->building_desc,
            'appraise_date'=>$request->appraise_date,
            'monthly_income'=>$request->monthly_income,
            'annual_income'=>$request->annual_income,
            'payback'=>$request->payback,
            'ownership_type'=>$request->ownership_type,
            'ownership_no'=>$request->ownership_no,
            'contract_exp'=>$request->contract_exp,
            'property_vlaue'=>$request->property_vlaue,
            'zone_no'=>$request->zone_no,
            'building_type'=>$request->building_type,
            'construction_date'=>$request->construction_date,
            'person_job'=>$request->person_job,
            'street_no'=>$request->street_no,
            'building_age'=>$request->building_age,
            'building_status'=>$request->building_status,
            'person_mobile'=>$request->person_mobile,
            'building_receive_date'=>$request->building_receive_date,
            'space'=>$request->built_up_area,
            'location'=>$request->building_location,
            'contract_no'=>$request->contract_no,
            'country'=>$request->country,
            'city'=>$request->city,
            'state'=>$request->state,
            'area'=>$request->zone_name,
            'pincode'=>$request->pincode,
            'building_pic'=>$mainpic,
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
$html='<option value="">--Select Zone--</option>';
foreach($res as $r){
    $html .='<option value="'.$r->name.'">'.$r->name.'</option>';
}
return response()->json($html);
}
public function fetchCountry($country_id){
    $res=City::where('Country_name',$country_id)->get();
    $html=' <option value="">--Select City--</option>';

    foreach($res as $r){
        $html .='<option value="'.$r->id.'">'.$r->name.'</option>';
    }
    return response()->json($html);
    }
public function document($id){
    $id = Crypt::decrypt($id);
    $document=Building::find($id);
    return view('admin.building.document',compact('document'));
}

    public function bulkUpload(Request $request)
    {
        if($request->hasFile('bulk_upload')){
            $file = $request->bulk_upload;
            $filename = time() . $file->getClientOriginalName();
            // dd($filename);
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $maxFileSize = 2097152;
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'uploads';
                    // Upload file
                    $file->move($location, $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                        $num = count($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    // dd($importData_arr);
                    // Insert to MySQL database
                    foreach ($importData_arr as $importData) {
                        $insertData = array(
                            "building_code" => $importData[0],
                            "building_name" => $importData[1],
                            "building_type" => $importData[2],
                            "building_status" => $importData[3],
                            "ownership_type" => $importData[4],
                            "ownership_no" => $importData[5],
                            "pin_no" => $importData[6],
                            "owner_name" => $importData[7],
                            "country" => $importData[8],
                            "city" => $importData[9],
                            "zone" => $importData[10],
                            "building_no" => $importData[11],
                            "street_no" => $importData[12],
                            "zone_no" => $importData[13],
                            "building_location_link" => $importData[14],
                            "person_incharge" => $importData[15],
                            "job" => $importData[16],
                            "mobile" => $importData[17],
                            "remark" => $importData[18],
                            "building_description" => $importData[19],
                        );
                        // dd($insertData);
                        if(!empty($insertData['building_code'])){
                             Building::create([
                                'user_id' => Auth::user()->id,
                                'building_code' =>$insertData['building_code'],
                                'name' => $insertData['building_name'],
                                'owner_name'=>$insertData['owner_name'],
                                'person_incharge'=>$insertData['person_incharge'],
                                'total_unit'=>0,
                                'building_type'=>$insertData['building_type'],
                                'construction_date'=>$insertData['construction_date'] ?? '',
                                'ownership_type'=>$insertData['ownership_type'],
                                'ownership_no'=>$insertData['ownership_no'],
                                'contract_exp'=>$insertData['contract_exp'] ?? '',
                                'person_job'=>$insertData['job'],
                                'building_no'=>$insertData['building_no'],
                                'building_age'=>$insertData['building_age'] ?? '',
                                'building_desc'=>$insertData['building_description'],
                                'building_status'=>$insertData['building_status'],
                                'appraise_date'=>$insertData['appraise_date'] ?? '',
                                'land_size_foot'=>$insertData['land_size_foot'] ?? '',
                                'price_foot'=>$insertData['price_foot'] ?? '',
                                'total_land'=>$insertData['status'] ?? '',
                                'status'=>$insertData['building_name'] ?? '',
                                'landsize_meter'=>$insertData['landsize_meter'] ?? '',
                                'cost_building'=>$insertData['cost_building'] ?? '',
                                'building_value'=>$insertData['building_value'] ?? '',
                                'monthly_income'=>$insertData['monthly_income'] ?? '',
                                'annual_income'=>$insertData['annual_income'] ?? '',
                                'payback'=>$insertData['payback'] ?? '',
                                'property_vlaue'=>$insertData['property_vlaue'] ?? '',
                                'zone_no'=>$insertData['zone_no'] ?? '',
                                'street_no'=>$insertData['street_no'] ?? '',
                                'person_mobile'=>$insertData['mobile'] ?? '',
                                'building_receive_date'=>$insertData['building_receive_date'] ?? '',
                                'space'=>$insertData['space'] ?? '',
                                'location'=>$insertData['building_location_link'] ?? '',
                                'contract_no'=>$insertData['contract_no'] ?? '',
                                'country'=>$insertData['country'] ?? '',
                                'city'=>$insertData['city'] ?? '',
                                'area'=>$insertData['area'] ?? '',
                                'pincode'=>$insertData['pin_no'] ?? '',
                                // 'building_pic'=>$mainpic,
                                // 'file' =>json_encode($otherpic),
                                'remark'=>$insertData['remark'] ?? '',
                            ]);

                        }
                    }
                    Session::flash('success', 'Import Successful.');
                    return redirect()->back();
                } else {
                    Session::flash('error', 'File too large. File must be less than 2MB.');
                    return redirect()->back();
                }
            }
        }else{
            Session::flash('error', 'Please upload a valid .csv file only');
            return redirect()->back();
        }
    }

}
