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

    protected $user_id = '';
    public function getUser()
    {
           if(Auth::user()->hasRole('Owner')){
              $this->user_id = Auth::user()->id;
          }
          else
          {
              $this->user_id = Auth::user()->created_by;
          }
    }
    public function index()
    {
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $units = Building::get();
        }
        else
        {
            $units = Building::where('user_id', $this->user_id)->get();
        }
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
        $this->getUser();

        if(Auth::user()->hasRole('superadmin')){
            $units=Unit::all();
        }
        else{
        $units=Unit::where('user_id',$this->user_id)->get();
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
        $this->getUser();
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
            'user_id'=>$this->user_id,
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
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $units = Building::get();
        }
        else
        {
            $units = Building::where('user_id', $this->user_id)->get();
        }
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
        $this->getUser();
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
                    $location = 'uploads/units';
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
                        $buidlingid=Building::where('building_code',$importData[0])->first()->id??'';
                        $insertData = array(
                            "building_name" =>$buidlingid ,
                            "unit_ref" => $importData[1],
                            "revenue_code" => $importData[2],
                            "unit_type" => $importData[3],
                            "unit_no" => $importData[4],
                            "unit_floor" => $importData[5],
                            "unit_size" => $importData[6],
                            "actual_rent" => $importData[7],
                            "unit_status" => $importData[8],
                            "remark" => $importData[9],
                            // "building_name" => $importData[0],
                            // "unit_code" => $importData[1],
                            // "unit_feature" => $importData[7],
                            // "electric_no" => $importData[8],
                            // "water_no" => $importData[9],
                            // "initial_rent" => $importData[10],
                            // "unit_description" => $importData[12],
                        );

                        if(!empty($insertData['unit_ref'])){
                            $unitType = UnitType::where('name', strtolower(trim($insertData['unit_type'] ?? '')))->first();
                            $unitStatus = UnitStatus::where('name', strtolower(trim($insertData['unit_status'] ?? '')))->first();
                            $building = Building::where('name', strtolower(trim($insertData['building_name'] ?? '')))->first();
                                Unit::firstOrCreate(['unit_no'=>$insertData['unit_no']],[
                                'user_id' => $this->user_id ?? '',
                                'building_id' => $buidlingid?? '',
                                'unit_ref'=>$insertData['unit_ref'] ?? '',
                                'revenue'=>$insertData['revenue_code'] ?? '',
                                'unit_type'=>$unitType->id ?? '',
                                'unit_floor'=>$insertData['unit_floor'] ?? '',
                                'unit_size'=>$insertData['unit_size'] ?? '',
                                'actual_rent'=>$insertData['actual_rent'] ?? '',
                                'unit_status'=>$unitStatus->id ?? '',
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

    public function fetch_unit_by_building($building_id)
    {
        $building = Building::find($building_id)->Units;
        $html = '<option value="">--select Unit--</option>';
        foreach($building as $b){
            $html .= '<option value="' . $b->id . '">' .$b->unit_ref.' ('.$b->unittypeinfo->name.') '. '</option>';
        }
        return response()->json($html);


    }

    public function ImportExportUnit(){
        return view('admin.unit.import_export');
    }
}
