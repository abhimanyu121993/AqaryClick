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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=Building::where('user_id',Auth::user()->id)->get();
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
            $role=Auth::user()->roles[0]->name;
        if($role=='superadmin'){
            $units=Unit::all();
        }
        else{
        $units=Unit::where('user_id',Auth::user()->id)->get();
        }
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
