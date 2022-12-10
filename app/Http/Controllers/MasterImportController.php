<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\CurrencyController;
use App\Mail\ExcelReport;
use App\Models\Building;
use App\Models\City;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Electricity;
use App\Models\Error;
use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\UnitFloor;
use App\Models\UnitStatus;
use App\Models\UnitType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use JetBrains\PhpStorm\Internal\TentativeType;

class MasterImportController extends Controller
{
    public function excel_upload(Request $req,$country=null)
    {
        
        $country=2;  //future country code select by user form
//check tenant code compulsory;
        if ($req->hasFile('bulk_upload')) {
            $file = $req->bulk_upload;
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
                    $location = 'uploads/tenant';
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
                        if ($i == 0 || $i==1) {
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
                        $tenantcode = strlen($importData[1]) > 0 ? $importData[1] : 'TP-' . time();
                            $city = City::firstOrCreate(['name' => $importData[16], 'country_name' => $country], [
                                'country_name'=>$country,
                                'name'=>$importData[16]
                            ]);
                            $insertBuildingData = array(
                                "building_code"=>$importData[10]??'',
                                "name"=>$importData[11]??'',
                                "building_no"=>$importData[12]??'',
                                "street_no"=>$importData[13]??'',
                                "zone_no"=>$importData[14]??'',
                                "area"=>$importData[15]??'',
                                "city"=>$city->id??'',
                                "ownership_no"=>$importData[17]??'',
                                "ownership_type"=>$importData[18]??'',
                                "pincode"=>$importData[19]??'',
                            );
                            $building=Building::firstOrCreate(["building_code"=>$importData[10]],$insertBuildingData);
                            if($building){
                            if ($importData[23] == null || $importData[23]==' ' || $importData[23]==' ') {
                                $unittype = UnitType::firstOrCreate(['name' =>'N/A'], ['name' =>'N/A']);
                            }
                            else
                            {
                                $unittype = UnitType::firstOrCreate(['name' => $importData[23]], ['name' => $importData[23] ?? 'N/A']);

                            }
                                $unitfloor=UnitFloor::firstOrCreate(['name'=>$importData[25]],['name'=>$importData[25]]);
                                $unitstatus=UnitStatus::firstOrCreate(['name'=>$importData[28]],['name'=>$importData[28]]);
                                $insertUnitData = array(
                                    "building_id"=>$building->id??'',
                                    "unit_ref"=>$importData[21]??'',
                                    "revenue"=>$importData[22]??'',
                                    "unit_type"=>$unittype->id??'', // it take from unit type table
                                    "unit_no"=>$importData[24]??'',
                                    "unit_floor"=>$unitfloor->id??'', //take from unit floor table
                                    "unit_size"=>$importData[26]??'',
                                    "actual_rent"=>$importData[27]??'',
                                    "unit_status"=>$unitstatus->id??'', //take from unit status table
                                );

                                $unit = Unit::firstOrCreate(["unit_ref" =>$importData[21] ], $insertUnitData);
                                // Error::create(['url' => 'Unit Found','message'=>json_encode($unit)]);
                                if($unit){
                                $qid = '';
                                $cr = '';
                                $established = '';
                                $govhouse = '';
                                $passport = '';
                                $tenanttype = '';
                                if($importData[3]=='passport'){
                                    $passport = $importData[2];
                                    $tenanttype = 'TP';
                                }
                                else if($importData[3]=='cr'){
                                    $cr= $importData[2];
                                    $tenanttype = 'TC';
                                }
                                else if($importData[3]=='card'){
                                    $established = $importData[2];
                                    $tenanttype = 'TC';
                                }
                                else if($importData[3]=='gov'){
                                    $govhouse = $importData[2];
                                    $tenanttype = 'TG';
                                }
                                else
                                {
                                    $qid = $importData[2];
                                    $tenanttype = 'TP';
                                }
                                    $insertTenantData = array(
                                        "building_name"=>$building->id??'',
                                        "file_no"=>$importData[0]??'',
                                        "tenant_code"=>$tenantcode??'',
                                        "tenant_document"=>$importData[3]??'',
                                        "qid_document"=>$qid??'',
                                        "cr_document"=>$cr??'',
                                        "established_card_no"=>$established??'',
                                        "government_housing_no"=>$govhouse??'',
                                        "passport"=>$passport??'',
                                        "tenant_type"=>$tenanttype,//condition based on established card and sponsor
                                        "tenant_english_name"=>$importData[4]??'',
                                        "tenant_primary_mobile"=>$importData[5]??'',
                                        "email"=>$importData[6]??'',
                                        "post_office"=>$importData[7]??'',
                                        "status"=>$importData[8]??'',
                                        "unit_type"=>$unit->unitTypeDetails->id,
                                        "unit_no"=>$unit->id,
                                    );
                                    $tenant=Tenant::firstOrCreate(["tenant_code"=>$tenantcode],$insertTenantData);
                                    if($tenant){
                                        $insertElectricData = array(
                                        "building_name"=>$building->id??'',
                                        "electric_no"=>$importData[29]??'',
                                        "water_no"=>$importData[30]??'',
                                        "unit_size"=>$importData[31]??'',
                                        "last_payment"=>Carbon::parse($importData[32])??'',
                                        "bill_amt"=>$importData[33]??'',
                                        "status"=>$importData[34]??'',
                                        "remark"=>$importData[35]??'',
                                        "user_id"=>Auth::user()->id??'',
                                        "name"=>$tenant->tenant_english_name??'', //tenant name,
                                        "unit_type"=>$unit->unitTypeDetails->name??'',  // unit type name
                                        "unit_no"=>$unit->unit_no??'',  //Unit no
                                        "qid_no"=>$tenant->qid_document??'', //tenant qid
                                        "reg_mobile"=>$tenant->tenant_primary_mobile??'' //tenant mobile
                                        );
                                        $electricity=Electricity::create($insertElectricData);
                                        if($electricity){
                                  
                                        // $contract_code= 'CC-'.$tenant->unittypeinfo->name?$tenant->unittypeinfo->name[0]:'NA'.'-'.$tenant->buildingDetails->zone_no.'-'.$tenant->buildingDetails->building_no.'-'.$tenant->unit_no.'-'.Carbon::now()->format('y');
                                        $contract_code = 'CC-' . time() . rand(0, 99);
                                        // dd($contract_code);
                                        // Error::create(['url' => 'contract code', 'message' => $contract_code]);
                                            $lessor = Customer::firstOrCreate(['first_name' => $importData[37], 'email' => $importData[38]],['first_name' => $importData[37], 'email' => $importData[38]]);
                                        
                                            $created_at=$importData[44]!=null?Carbon::createFromFormat('d-M-Y',$importData[44])->timestamp:'';
                                            $attestation_expiry=$importData[42]!=null?Carbon::createFromFormat('d-M-Y',$importData[42])->timestamp:'';
                                          
                                            $release_date=$importData[45]!=null?Carbon::createFromFormat('d-M-Y',$importData[45])->timestamp:'';
                                          
                                            $lease_start_date=$importData[46]!=null?Carbon::createFromFormat('d-M-Y',$importData[46])->timestamp:'';
                                            $lease_end_date=$importData[47]!=null?Carbon::createFromFormat('d-M-Y',$importData[47])->timestamp:'';
                                            $insertContract = array(
                                                'contract_code'=>$contract_code??'',
                                                'tenant_name'=>$tenant->id??'',
                                                'lessor'=>$lessor->id??'',
                                                'sponsor_name'=>$importData[39]??'',
                                                'sponsor_id'=>$importData[40]??'',
                                                'sponsor_mobile'=>$importData[41]??'',
                                                'attestation_no'=>$importData[42]??'',
                                                'attestation_expiry'=>$attestation_expiry,
                                                // 'created_at'=>$created_at??Carbon::now(),
                                                'release_date'=>$release_date,
                                                'lease_start_date'=>$lease_start_date,
                                                'lease_end_date'=> $lease_end_date,
                                                'lease_period_month'=>$importData[49],
                                                'discount'=>$importData[51],
                                                'increament_term'=>$importData[52],
                                                'contract_status'=>$importData[53],
                                                'contract_type'=>'Internal',
                                                'total_invoice'=>$importData[49],
                                            );

                                      
                                            $contract=Contract::firstOrCreate(['contract_code'=>$contract_code],$insertContract);
                                     
                                            if ($contract) {
                                                $receipt_count=$importData[68]??0;
                                                $receipt=str_pad((int)$receipt_count+1, 3, '0', STR_PAD_LEFT);
                                                $invoice_no=$importData[68]??0;
                                                $invoice_no= 'INV' . '-' . Carbon::now()->day . Carbon::now()->month . Carbon::now()->format('y') . '-'.str_pad((int)$invoice_no+1, 3, '0', STR_PAD_LEFT);
                                                $period_month=$importData[68]??0 + 1;
                                                $inserInvoice = array(
                                                    'tenant_id'=>$tenant->id,
                                                    'contract_id'=>$contract->id,
                                                    'user_id'=>Auth::user()->id,
                                                    'invoice_period_start'=>Carbon::parse($contract->lease_start_date)->addMonth($period_month),
                                                    'invoice_period_end'=>Carbon::parse($contract->lease_start_date)->addMonth((int)$period_month+1),
                                                    'amt_paid'=>$importData[72]??0,
                                                    'user_amt'=>0,
                                                    'due_date'=>0,
                                                    'invoice_no'=>$invoice_no,
                                                    'receipt_no'=>$receipt,
                                                    'total_amt'=>$importData[72]??0,

                                                );
                                            $invoice=Invoice::create($inserInvoice);
                                                if($invoice){
                                                // dd($invoice);
                                                }
                                                else
                                                {
                                                    Session::flash('error', 'Invoice Not Created Due to Some Error Excel import paused in mid ');
                                                    return redirect()->back();
                                                }
                                            }
                                            else
                                            {
                                                Session::flash('error', 'Contract Not Created Due to Some Error Excel import paused in mid ');
                                                return redirect()->back(); 
                                            }
                                            
                                        }
                                        else
                                        {
                                            Session::flash('error', 'Electricity Not Created Due to Some Error Excel import paused in mid ');
                                            return redirect()->back(); 
                                        }
                                    }
                                    else
                                    {
                                        Session::flash('error', 'Tenant Not Created Due to Some Error Excel import paused in mid ');
                                        return redirect()->back(); 
                                    }
                                }
                                else
                                {
                                    Session::flash('error', 'Unit Not Created Due to Some Error Excel import paused in mid ');
                                    return redirect()->back();
                                }
                                
                            }
                            else
                            {
                                Session::flash('error', 'Building Not Created Due to Some Error Excel import paused in mid ');
                                return redirect()->back();
                            }
                   
                    
                    }
                    Session::flash('success', 'Import Successful.');
                    return redirect()->back();
                }
            else {
                Session::flash('error', 'File too large. File must be less than 2MB.');
                return redirect()->back();
            }

            }
            else
            {
                Session::flash('error', 'Please upload a valid .csv file only');
            }
        }else{
            Session::flash('error', 'Please upload a valid .csv file only');
        }
        return redirect()->back();
    }

    public function excel_upload_statement(Request $req)
    {
        
        if ($req->hasFile('bulk_upload')) {
            $file = $req->bulk_upload;
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
                    $location = 'uploads/tenant';
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
                        if ($i == 0 || $i==1) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    foreach($importData_arr as $importData){
                        $report = '';
                        $tenant = Tenant::where('tenant_code', $importData[0])->first();
                        $contract = Contract::where('contract_code', $importData[1])->first();
                        $cur = new CurrencyController;
                        if ($tenant and $contract) {
                            $receipt_no=Invoice::where('tenant_id',$tenant->id)->where('contract_id',$contract->id)->count()+1;
                            $inserStatement = [
                                'tenant_id'=>$tenant->id,
                                'contract_id'=>$contract->id,
                                'invoice_no'=>'INV-'.time().rand(0,99),
                                'receipt_no'=>str_pad($receipt_no,3,'0', STR_PAD_LEFT),
                                'due_date'=>$importData[2]??'',
                                'invoice_period_start'=>$importData[3]??'',
                                'invoice_period_end'=>$importData[4]??'',
                                'currency_type'=>$importData[5],
                                'amt_paid'=>$cur->convertAmtInSarDt($importData[5],$importData[6]),
                                'user_amt'=>$importData[6],
                                'due_amt'=>$cur->convertAmtInSarDt($importData[5],$importData[7])??0,
                                'istax'=>$importData[7]!='' || $importData[7]!=NULL?'true':'false',
                                'tax_amt'=>$importData[8],
                                'total_amt'=>$cur->convertAmtInSarDt($importData[5],$importData[6])+$cur->convertAmtInSarDt($importData[5],$importData[7]),
                                'payment_method'=>$importData[9]??'',
                                'account_no'=>$importData[10]??'',
                                'bank_name'=>$importData[11]??'',
                                'payment_status'=>$importData[12]??'',
                                'remark'=>$importData[19],
                                'tenant_account'=>$importData[13],
                                'tenant_bank'=>$importData[14],
                                'tax_no'=>$importData[15],
                                'benifitary_account'=>$importData[16],
                                'benifitary_name'=>$importData[17],
                            ];
                            $invoice = Invoice::Create($inserStatement);
                        }
                        else
                        {
                            $report .= "Tenant Code " . $importData[0] . " OR Contract Code ".$importData[1]." not Found So Data not inserted";
                        }

                    }
                    if($report!=''){
                        Mail::to(Auth::user()->email)->send(new ExcelReport($report));
                    }
                    else
                    {
                        $report='Statement Imported Successfully';
                        Mail::to(Auth::user()->email)->send(new ExcelReport($report));
                    }
                    Session::flash('success', 'Import Successful.');
                    return redirect()->back();
                }
            else {
                Session::flash('error', 'File too large. File must be less than 2MB.');
                return redirect()->back();
            }

            }
            else
            {
                Session::flash('error', 'Please upload a valid .csv file only');
            }
        }else{
            Session::flash('error', 'Please upload a valid .csv file only');
        }
        return redirect()->back();
    }
}
