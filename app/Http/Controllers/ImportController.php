<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Grace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ImportController extends Controller
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
    public function buildingImport(Request $request)
    {
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
                        $insertData = array(
                            "Building Code" => $importData[0],
                            "Property Name" => $importData[1],
                            "Bldg No" => $importData[2],
                            "ST No" => $importData[3],
                            "Zone No" => $importData[4],
                            "Zone Name" => $importData[5],
                            "City Name" => $city,
                            "Ownership No" => $importData[7],
                            "Ownership Type" => $importData[8],
                            "Pin No" => $importData[9],
                            "Location" => $importData[10],

                        );
                        // dd($insertData);
                        if (!empty($insertData['Building Code'])) {
                            $res = Building::firstOrCreate(['building_code' => $insertData['Building Code']], [
                                'user_id' => Auth::user()->id,
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
    public function graceImport(Request $request)
    {
        $this->getUser();
        if ($request->hasFile('grace_upload')) {
            $file = $request->grace_upload;
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
                    $location = 'uploads/contract';
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
                        $insertData = [
                            'user_id'=>$this->user_id,
                            'contract_code'=>$importData[0]??'',
                            'grace_start_date'=>Carbon::parse($importData[1])??'',
                            'grace_end_date'=>Carbon::parse($importData[2])??'',
                            'grace_period_month'=>Carbon::parse($importData[1])->diffInMonths(Carbon::parse($importData[2])),
                            'grace_period_day'=>Carbon::parse($importData[1])->diffInDays(Carbon::parse($importData[2])),
                        ];
                        $res=Grace::create($insertData);
                        Contract::where('contract_code', $res->contract_code)->increment('grace_count');
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
}
