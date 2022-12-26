<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Building;
use App\Models\BuildingFiles;
use App\Models\BuildingStatus;
use App\Models\BuildingType;
use App\Models\City;
use App\Models\Nationality;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class BuildingController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $buildings = Building::all();
        }
        else
        {
            $buildings = Building::where('user_id',$this->user_id)->get();
        }
        $building_types = BuildingType::all();
        $building_statuses = BuildingStatus::all();
        $cityDetail = City::all();
        $countryDetail = Nationality::all();
        $zoneDetail = Area::all();
        return view('admin.building.register_building', compact('buildings', 'building_types', 'building_statuses', 'cityDetail', 'countryDetail', 'zoneDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getUser();
        $role = Auth::user()->roles[0]->name;
        if ($role == 'superadmin') {
            $buildings = Building::all();
            // dd($buildings);
        } else {
            $buildings = Building::where('user_id', $this->user_id)->get();
        }

        return view('admin.building.all_building', compact('buildings'));
    }

    public function get_buildings(Request $req)
    {
        $this->getUser();
        $role = Auth::user()->roles[0]->name;
        $query = Building::query()->with(['nationality', 'cityDetails', 'Units']);
        if ($role == 'superadmin') {

        } else {
            $query->where('user_id', $this->user_id);
        }
        $buildings = $query->get();
        // if ($req->ajax()) {
        return DataTables::of($buildings)->addIndexColumn()
            ->addColumn('image', function ($raw) {
                $imgtag = "<img src='" . asset("upload/building/" . $raw->building_pic) . "' class='me-75 bg-light-danger' style='height:55px;width:55px;'>";
                return $imgtag;
            })
            ->addColumn('document', function ($doc) {
                $bid = Crypt::encrypt($doc->id);
                $do = '<a href="';
                $do .= route('admin.document', $bid);
                $do .= '">View</a>';
                return $do;
            })
            ->addColumn('action', function ($doc) {
                $d = '  <div class="dropdown">
                <a href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-more-2-fill"></i>
                </a>';
                $bid = Crypt::encrypt($doc->id);
                $d .= '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';

                if (Auth::user()->hasPermissionTo('Building_edit')) {
                    $d .= '<li><a class="dropdown-item" id="pop" href="';
                    $d .= route('admin.register_building.edit', $bid);
                    $d .= '">Edit</a>
                        </li>';
                }
                if (Auth::user()->hasPermissionTo('Building_delete')) {
                    $d .= '
                        <li><a class="dropdown-item" id="pop" href="#"';
                    $d .= '
                                onclick="event.preventDefault();document.getElementById(\'delete-form-{{ $bid }}\').submit();">';
                    $d .= "Delete</a>
                        </li>";
                }
                $d .= '
                    <form id="delete-form-{{ $bid }}"
                        action="';
                $d .= route('admin.register_building.destroy', $bid);
                $d .= '" method="post" style="display: none;">';

                // @method('DELETE')
                $d .= ' <input type="hidden" name="_token" value="' . csrf_token() . '">';
                $d .= '</form>
                </ul>
            </div>';
                return $d;
            })
            ->addColumn('updated', function ($c) {
                return Carbon::parse($c->updated_at)->format('d-m-Y H:i A');
            })
            ->addColumn('deleted', function ($c) {
                return Carbon::parse($c->deleted_at)->format('d-m-Y H:i A');
            })
            ->addColumn('units', function ($u) {
                return $u->Units->count();
            })
            ->rawColumns(['image', 'document', 'action', 'created'])
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
        $this->getUser();
        $request->validate([
            'building_code' => 'required',
            'building_name' => 'required',
            'building_type' => 'required',
            'status' => 'required',
            'ownership_type' => 'required',
            'pincode' => 'required',
            'owner_name' => 'required',
            'lessor_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zone_name' => 'required',
            'building_no' => 'required',
            'street_no' => 'required',
            'zone_no' => 'required',
            'construction_date' => 'required',
            'building_age' => 'required',
            'building_status' => 'required',
            'built_up_area' => 'required',
            'cost_building' => 'required',
            'building_value' => 'required',
            'landsize_meter' => 'required',
            'land_size_foot' => 'required',
            'price_foot' => 'required',
            'total_land' => 'required',
            'monthly_income' => 'required',
            'annual_income' => 'required',
            'payback' => 'required',
            'property_vlaue' => 'required',
            'incharge_name' => 'required',
            'person_job' => 'required',
            'person_mobile' => 'required',
            'building_receive_date' => 'required',




        ]);

        $mainpic=[];
        if($request->hasFile('building_pic'))
        {
            foreach($request->file('building_pic') as $file)
            {
                $build_name='build-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/building'),$build_name);
                $mainpic []=$build_name;
            }
        }
        $data = Building::create([
            'user_id' => $this->user_id,
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name' => $request->owner_name,
            'lessor_name' => $request->lessor_name,
            'person_incharge' => $request->incharge_name,
            'total_unit' => $request->total_unit,
            'building_type' => $request->building_type,
            'construction_date' => $request->construction_date,
            'ownership_type' => $request->ownership_type,
            'ownership_no' => $request->ownership_no,
            'contract_exp' => $request->contract_exp,
            'person_job' => $request->person_job,
            'building_no' => $request->building_no,
            'building_age' => $request->building_age,
            'building_desc' => $request->building_desc,
            'building_status' => $request->building_status,
            'appraise_date' => $request->appraise_date,
            'land_size_foot' => $request->land_size_foot,
            'price_foot' => $request->price_foot,
            'total_land' => $request->total_land,
            'status' => $request->status,
            'landsize_meter' => $request->landsize_meter,
            'cost_building' => $request->cost_building,
            'building_value' => $request->building_value,
            'monthly_income' => $request->monthly_income,
            'annual_income' => $request->annual_income,
            'payback' => $request->payback,
            'property_vlaue' => $request->property_vlaue,
            'zone_no' => $request->zone_no,
            'street_no' => $request->street_no,
            'person_mobile' => $request->person_mobile,
            'building_receive_date' => $request->building_receive_date,
            'space' => $request->built_up_area,
            'location' => $request->building_location,
            'contract_no' => $request->contract_no,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'area' => $request->zone_name,
            'pincode' => $request->pincode,
            'building_pic' => json_encode($mainpic),
            'remark' => $request->remark,
        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Building Registration has been created successfully.');
        } else {
            return redirect()->back()->with('error', 'Building Registration not created.');
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
        $buildingedit = Building::find($id);
        $building_types = BuildingType::all();
        $building_statuses = BuildingStatus::all();
        $buildings = Building::all();
        $countryDetail = Nationality::all();
        return view('admin.building.register_building', compact('buildingedit', 'buildings', 'building_types', 'building_statuses', 'countryDetail'));
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

            // 'building_code' => 'required',
            'building_name' => 'required',
            // 'building_type' => 'required',
            // 'status' => 'required',
            // 'ownership_type' => 'required',
            // 'pincode' => 'required',
            // 'owner_name' => 'required',
            // 'lessor_name' => 'required',
            // 'country' => 'required',
            // 'city' => 'required',
            // 'zone_name' => 'required',
            // 'building_no' => 'required',
            // 'street_no' => 'required',
            // 'zone_no' => 'required',
            // 'construction_date' => 'required',
            // 'building_age' => 'required',
            // 'building_status' => 'required',
            // 'built_up_area' => 'required',
            // 'cost_building' => 'required',
            // 'building_value' => 'required',
            // 'landsize_meter' => 'required',
            // 'land_size_foot' => 'required',
            // 'price_foot' => 'required',
            // 'total_land' => 'required',
            // 'monthly_income' => 'required',
            // 'annual_income' => 'required',
            // 'payback' => 'required',
            // 'property_vlaue' => 'required',
            // 'incharge_name' => 'required',
            // 'person_job' => 'required',
            // 'person_mobile' => 'required',
            // 'building_receive_date' => 'required',

        ]);

        $mainpic = [];
        if($request->hasFile('building_pic'))
        {
            foreach($request->file('building_pic') as $file)
            {
                $build_name='build-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/building'),$build_name);
                $mainpic[]=$build_name;
            }
        }

        if (count($mainpic) > 0) {
            Building::find($id)->update(['building_pic' => json_encode($mainpic)]);
        }

        $data = Building::find($id)->update([
            'building_code' => $request->building_code,
            'name' => $request->building_name,
            'owner_name' => $request->owner_name,
            'lessor_name' => $request->lessor_name,
            'person_incharge' => $request->incharge_name,
            'total_unit' => $request->total_unit,
            'building_no' => $request->building_no,
            'status' => $request->status,
            'land_size_foot' => $request->land_size_foot,
            'price_foot' => $request->price_foot,
            'total_land' => $request->total_land,
            'landsize_meter' => $request->landsize_meter,
            'cost_building' => $request->cost_building,
            'building_value' => $request->building_value,
            'building_desc' => $request->building_desc,
            'appraise_date' => $request->appraise_date,
            'monthly_income' => $request->monthly_income,
            'annual_income' => $request->annual_income,
            'payback' => $request->payback,
            'ownership_type' => $request->ownership_type,
            'ownership_no' => $request->ownership_no,
            'contract_exp' => $request->contract_exp,
            'property_vlaue' => $request->property_vlaue,
            'zone_no' => $request->zone_no,
            'building_type' => $request->building_type,
            'construction_date' => $request->construction_date,
            'person_job' => $request->person_job,
            'street_no' => $request->street_no,
            'building_age' => $request->building_age,
            'building_status' => $request->building_status,
            'person_mobile' => $request->person_mobile,
            'building_receive_date' => $request->building_receive_date,
            'space' => $request->built_up_area,
            'location' => $request->building_location,
            'contract_no' => $request->contract_no,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'area' => $request->zone_name,
            'pincode' => $request->pincode,
            'building_pic' => $mainpic,
            'remark' => $request->remark,
        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Building Registration has been Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Building Registration not Updated.');
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
        $data = Building::find($id);
        if ($data->delete()) {
            return redirect()->back()->with('success', 'Data Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Data not deleted.');
        }
    }

    public function fetchZone($city_id)
    {

        $res = Area::where('city_id', $city_id)->get();
        $html = '<option value="">--Select Zone--</option>';
        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->name . '</option>';
        }
        return response()->json($html);
    }
    public function fetchCountry($country_id)
    {
        $res = City::where('Country_name', $country_id)->get();
        $html = ' <option value="">--Select City--</option>';

        foreach ($res as $r) {
            $html .= '<option value="' . $r->id . '">' . $r->name . '</option>';
        }
        return response()->json($html);
    }
    public function document($id)
    {
        $id = Crypt::decrypt($id);
        $document = Building::find($id);
        return view('admin.building.document', compact('document'));
    }

    public function bulkUpload(Request $request)
    {
        $this->getUser();
        if ($request->hasFile('bulk_upload')) {
            $file = $request->bulk_upload;
            $filename = time() . $file->getClientOriginalName();
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
                    $location = 'uploads/building';
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
                        $city = City::where('name', $importData[6])->first()->id ?? '';
                        $area = Area::firstOrCreate(['name'=>$importData[5],'city_id'=>$city],['name'=>$importData[5],'city_id'=>$city])->id ?? '';
                        $insertData = array(
                            "Building Code" => $importData[0],
                            "Property Name" => $importData[1],
                            "Bldg No" => $importData[2],
                            "ST No" => $importData[3],
                            "Zone No" => $importData[4],
                            "Zone Name" => $area,
                            "City Name" => $city,
                            "Ownership No" => $importData[7],
                            "Ownership Type" => $importData[8],
                            "Pin No" => $importData[9],
                            "Location" => $importData[10],

                        );
                        // dd($insertData);
                        if (!empty($insertData['Building Code'])) {
                            $res = Building::firstOrCreate(['building_code' => $insertData['Building Code']], [
                                'user_id' => $this->user_id,
                                'building_code' => $insertData['Building Code'],
                                'name' => $insertData['Property Name'],
                                'building_no' => $insertData['Bldg No'],
                                'street_no' => $insertData['ST No'],
                                'zone_no' => $insertData['Zone No'],
                                'area' => $insertData['Zone Name'],
                                'city' => $insertData['City Name'],
                                'ownership_no' => $insertData['Ownership No'],
                                'ownership_type' => $insertData['Ownership Type'],
                                'pincode' => $insertData['Pin No'],
                                'location' => $insertData['Location'],

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
        } else {
            Session::flash('error', 'Please upload a valid .csv file only');
            return redirect()->back();
        }
    }
    public function ImportExportBuilding()
    {
        return view('admin.building.import_export');
    }

    public function buildingFiles()
    {
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $building = Building::all();
            $files=BuildingFiles::all();
        }
        else
        {
            $building = Building::where('user_id',$this->user_id)->get();
            $files=BuildingFiles::where('user_id',$this->user_id)->get();
        }
        return view('admin.building.building_file',compact('building','files'));
    }

    public function buildingFilesStore(Request $request){

        $this->getUser();
        $request->validate([
            'file_name*' => 'required',
        ]);
        $files=$request->attachment_file;
    foreach ($request->building_code as $k=>$bcode)
     {
         $name=$bcode.'-'.time().'-'.rand(0,9).'.'.$files[$k]->extension();
         $files[$k]->move(public_path('upload/building/files'), $name);
        $res = BuildingFiles::create(['user_id' => $this->user_id,'building_id' => $bcode, 'file_name' => $request->file_name[$k] ?? '', 'attachment' => $name ?? '']);

    }
    Session::flash('success','File Uploaded Successfully');
    return redirect()->back();
    }

    public function buildingFilesDelete($id){
       $id = Crypt::decrypt($id);
        $data=BuildingFiles::find($id);
        $name=$data->attachment;

        if($data->delete())
        {
            $file=File::delete((public_path('upload/building/files/'.$name)));
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }
}
