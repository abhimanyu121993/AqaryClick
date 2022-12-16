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
    public function excel_upload(Request $req,$country=null)
    {
        $this->getUser();
        $country=2;  
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
                            $city = City::firstOrCreate(['name' => $importData[23], 'country_name' => $country], [
                                'country_name'=>$country,
                                'name'=>$importData[23]
                            ]);
                            $insertBuildingData = array(
                                "building_code"=>$importData[17]??'',
                                "name"=>$importData[18]??'',
                                "user_id"=>$this->user_id??'',
                                "building_no"=>$importData[19]??'',
                                "street_no"=>$importData[20]??'',
                                "zone_no"=>$importData[21]??'',
                                "area"=>$importData[22]??'',
                                "city"=>$city->id??'',
                                "ownership_no"=>$importData[24]??'',
                                "ownership_type"=>$importData[25]??'',
                                "pincode"=>$importData[26]??'',
                            );
                            $building=Building::firstOrCreate(["building_code"=>$importData[17]],$insertBuildingData);
                            if($building){
                            if ($importData[30] == null || $importData[30]==' ' || $importData[30]==' ') {
                                $unittype = UnitType::firstOrCreate(['name' =>'N/A'], ['name' =>'N/A']);
                            }
                            else
                            {
                                $unittype = UnitType::firstOrCreate(['name' => $importData[30]], ['name' => $importData[30] ?? 'N/A']);

                            }
                                $unitfloor=UnitFloor::firstOrCreate(['name'=>$importData[32]],['name'=>$importData[32]]);
                                $unitstatus=UnitStatus::firstOrCreate(['name'=>$importData[35]],['name'=>$importData[35]]);
                                $insertUnitData = array(
                                    "building_id"=>$building->id??'',
                                    "user_id"=>$this->user_id??'',
                                    "unit_ref"=>$importData[28]??'',
                                    "revenue"=>$importData[29]??'',
                                    "unit_type"=>$unittype->id??'', // it take from unit type table
                                    "unit_no"=>$importData[31]??'',
                                    "unit_floor"=>$unitfloor->id??'', //take from unit floor table
                                    "unit_size"=>$importData[33]??'',
                                    "actual_rent"=>$importData[34]??'',
                                    "unit_status"=>$unitstatus->id??'', //take from unit status table
                                );

                                $unit = Unit::firstOrCreate(["unit_ref" =>$importData[28] ], $insertUnitData);
                                // Error::create(['url' => 'Unit Found','message'=>json_encode($unit)]);
                                if($unit){
                                $qid = '';
                                $cr = '';
                                $established = '';
                                $govhouse = '';
                                $passport = '';
                                $tenanttype = '';
                                if($importData[3]=='PASSPORT'){
                                    $passport = $importData[5];
                                }
                                else if($importData[3]=='CR & EST CARD'){
                                    $cr= $importData[6];
                                    $established = $importData[7];

                                }
                                else if($importData[3]=='GOVERNMENT HOUSING No'){
                                    $govhouse = $importData[8];

                                }
                                else if($importData[3]=='QID'){
                                    $qid = $importData[4];
                                    
                                }

                                $tenanttype = $importData[2]=='Personal'? 'TP':($importData[2]=='Company'? 'TC':($importData[2]=='Government'? 'TG':''));
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
                                        "tenant_english_name"=>$importData[9]??'',
                                        "tenant_primary_mobile"=>$importData[10]??'',
                                        "email"=>$importData[11]??'',
                                        "authorized_person"=>$importData[12]??'',
                                        "authorized_person_qid"=>$importData[13]??'',
                                        "user_id"=>$this->user_id??'',
                                        "post_office"=>$importData[14]??'',
                                        "status"=>$importData[15]??'',
                                        "unit_type"=>$unit->unitTypeDetails->id,
                                        "unit_no"=>$unit->id,
                                    );
                                    $tenant=Tenant::firstOrCreate(["tenant_code"=>$tenantcode],$insertTenantData);
                                    if($tenant){
                                        $insertElectricData = array(
                                        "building_name"=>$building->id??'',
                                        "user_id"=>$this->user_id??'',
                                        "electric_no"=>$importData[36]??'',
                                        "water_no"=>$importData[37]??'',
                                        "unit_size"=>$importData[38]??'',
                                        "last_payment"=>Carbon::parse($importData[39])??'',
                                        "bill_amt"=>$importData[40]??'',
                                        "status"=>$importData[41]??'',
                                        "remark"=>$importData[42]??'',
                                        "name"=>$tenant->tenant_english_name??'', //tenant name,
                                        "unit_type"=>$unit->unitTypeDetails->name??'',  // unit type name
                                        "unit_no"=>$unit->unit_no??'',  //Unit no
                                        "qid_no"=>$tenant->qid_document??'', //tenant qid
                                        "reg_mobile"=>$tenant->tenant_primary_mobile??'' //tenant mobile
                                        );
                                        $electricity=Electricity::create($insertElectricData);
                                        if($electricity){
                                  
                                          // $contract_code= 'CC-'.$tenant->unittypeinfo->name?$tenant->unittypeinfo->name[0]:'NA'.'-'.$tenant->buildingDetails->zone_no.'-'.$tenant->buildingDetails->building_no.'-'.$tenant->unit_no.'-'.Carbon::now()->format('y');
                                          $contract_code = 'CC-'.$tenant->unittypeinfo->name[0]?:'NA';
                                          $contract_code=$contract_code.'-'.$tenant->buildingDetails->zone_no.'-'.$tenant->buildingDetails->building_no.'-'.$tenant->unit_no.'-'.Carbon::now()->format('y');
                                          //  $contract_code = 'CC-' . time() . rand(0, 99);
                                        // Error::create(['url' => 'contract code', 'message' => $contract_code]);
                                            $lessor = Customer::firstOrCreate(['first_name' => $importData[44], 'email' => $importData[45]],['first_name' => $importData[44], 'email' => $importData[45]]);
                                            $created_at=Carbon::parse($importData[52])->format('d-m-Y')!=null?Carbon::parse($importData[52])->format('d-m-Y'):'';
                                            $attestation_expiry=$importData[50]!=null?Carbon::parse($importData[50])->format('d-m-Y'):'';
                                            $release_date=$importData[53]!=null?Carbon::parse($importData[53])->format('d-m-Y'):'';
                                          
                                            $lease_start_date=$importData[54]!=null?Carbon::parse($importData[54])->format('d-m-Y'):'';
                                            $lease_end_date=$importData[55]!=null?Carbon::parse($importData[55])->format('d-m-Y'):'';
                                            $insertContract = array(
                                                'contract_code'=>$contract_code??'',
                                                'tenant_name'=>$tenant->id??'',
                                                'document_type'=>$tenant->tenant_document,
                                                "qid_document"=>$qid??'',
                                                "cr_document"=>$cr??'',
                                                "established_card_no"=>$established??'',
                                                "government_housing_no"=>$govhouse??'',
                                                "passport_document"=>$passport??'',
                                                'tenant_mobile'=>$tenant->tenant_primary_mobile,
                                                'tenant_nationality'=>$tenant->nationality,
                                                'lessor'=>$lessor->id??'',
                                                'user_id'=>$this->user_id??'',
                                                'sponsor_name'=>$importData[46]??'',
                                                'sponsor_id'=>$importData[47]??'',
                                                'sponsor_mobile'=>$importData[48]??'',
                                                'attestation_no'=>$importData[49]??'',
                                                'attestation_expiry'=>$attestation_expiry,
                                                'created_at'=>$created_at,
                                                'release_date'=>$release_date,
                                                'lease_start_date'=>$lease_start_date,
                                                'lease_end_date'=> $lease_end_date,
                                                'lease_period_month'=>$importData[56],
                                                'discount'=>$importData[58],
                                                'increament_term'=>$importData[59],
                                                'contract_status'=>$importData[60],
                                                'rent_amount'=>$importData[61],
                                                'contract_type'=>'Internal',
                                                'total_invoice'=>$importData[56],
                                            );

                                      
                                            $contract=Contract::firstOrCreate(['contract_code'=>$contract_code],$insertContract);
                                     
                                            // if ($contract) {
                                            //     $receipt_count=$importData[68]??0;
                                            //     $receipt=str_pad((int)$receipt_count+1, 3, '0', STR_PAD_LEFT);
                                            //     $invoice_no=$importData[68]??0;
                                            //     $invoice_no= 'INV' . '-' . Carbon::now()->day . Carbon::now()->month . Carbon::now()->format('y') . '-'.str_pad((int)$invoice_no+1, 3, '0', STR_PAD_LEFT);
                                            //     $period_month=$importData[68]??0 + 1;
                                            //     $inserInvoice = array(
                                            //         'tenant_id'=>$tenant->id,
                                            //         'contract_id'=>$contract->id,
                                            //         'user_id'=>$this->user_id,
                                            //         'invoice_period_start'=>Carbon::parse($contract->lease_start_date)->addMonth($period_month),
                                            //         'invoice_period_end'=>Carbon::parse($contract->lease_start_date)->addMonth((int)$period_month+1),
                                            //         'amt_paid'=>$importData[72]??0,
                                            //         'user_amt'=>0,
                                            //         'due_date'=>0,
                                            //         'invoice_no'=>$invoice_no,
                                            //         'receipt_no'=>$receipt,
                                            //         'total_amt'=>$importData[72]??0,

                                            //     );
                                            // $invoice=Invoice::create($inserInvoice);
                                            //     if($invoice){
                                            //     // dd($invoice);
                                            //     }
                                            //     else
                                            //     {
                                            //         Session::flash('error', 'Invoice Not Created Due to Some Error Excel import paused in mid ');
                                            //         return redirect()->back();
                                            //     }
                                            // }
                                            // else
                                            // {
                                            //     Session::flash('error', 'Contract Not Created Due to Some Error Excel import paused in mid ');
                                            //     return redirect()->back(); 
                                            // }
                                            
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
