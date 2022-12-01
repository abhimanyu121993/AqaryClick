<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Nationality;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit=UnitType::all();
        $nation=Nationality::all();
        $building=Building::where('user_id',Auth::user()->id)->get();
        return view('admin.tenant.tenantregister',compact('nation','unit','building'));
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
            $all_tenant=Tenant::all();
        }
        else{
            $all_tenant=Tenant::where('user_id',Auth::user()->id)->get();
        }
        return view('admin.tenant.tenats',compact('all_tenant'));
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
                'tenant_code' => 'nullable',
                'tenant_english_name' => 'nullable',
                'tenant_arabic_name' => 'nullable',
                'tenant_document'=>'nullable',
                'qid_document' => 'nullable',
                'cr_document'=>'nullable',
                'passport'=>'nullable',
                'tenant_nationality'=>'nullable',
                'tenant_primary_mobie'=>'nullable',
                'tenant_secondary_mobile'=>'nullable',
                'email'=>'nullable',
                'post_office'=>'nullable',
                'address'=>'nullable',
                'tenant_type'=>'nullable',
                'unit_type'=>'nullable',
                'unit_address'=>'nullable',
                'rental_period'=>'nullable',
                'rental_time'=>'nullable',
                'payment_methode'=>'nullable',
                'payment_receipt'=>'nullable',
                'attachment_file'=>'nullable',
                'attachment_remark'=>'nullable'
            ]);

        $otherpic=[];

       
        if($request->hasFile('attachment_file'))
        {
            foreach($request->file('attachment_file') as $file)
            {
                $name='tenant-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/tenent'),$name);
                $otherpic[]=$name;
            }
        }
        if($request->password==null){
            $nUser= User::create([
                'first_name' => $request->tenant_english_name,
                'email'=>$request->email,
                'phone' =>$request->tenant_primary_mobile,
                'password'=>Hash::make(123456),
            ]);
        }
        else{
            $nUser= User::create([
                'first_name' => $request->tenant_english_name,
                'email'=>$request->email,
                'phone' =>$request->tenant_primary_mobile,
                'password'=>Hash::make($request->password),
            ]);
        }
        $nUser->assignRole('Tenant');
        $tenant=Tenant::create([
            'user_id'=>Auth::user()->id,
            'file_no'=>$request->file_no,
            'tenant_code'=>$request->tenant_code,
            'tenant_english_name'=>$request->tenant_english_name,
            'tenant_arabic_name'=>$request->tenant_arabic_name,
            'tenant_type'=>$request->tenant_type,
            'tenant_document'=>$request->tenant_document,
            'qid_document'=>$request->qid_document,
            'cr_document'=>$request->cr_document,
            'passport'=>$request->passport,
            'tenant_primary_mobile'=>$request->tenant_primary_mobile,
            'tenant_secondary_mobile'=>$request->tenant_secondary_mobile,
            'email'=>$request->email,
            'post_office'=>$request->post_office,
            'tenant_nationality'=>$request->tenant_nationality,
            'unit_address'=>$request->tenant_unit_address,
            'account_no'=>$request->account_no,
            'building_name'=>$request->building_name,
            'status'=>$request->status,
            'total_unit'=>$request->total_unit,
            'unit_type'=>$request->unit_type,
            'rental_period'=>$request->rental_period,
            'rental_time'=>$request->rental_time,
            'payment_method'=>$request->payment_method,
            'payment_receipt'=>$request->payment_receipt,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_oid'=>$request->sponsor_oid,
            'sponsor_email'=>$request->sponsor_email,
            'sponsor_phone'=>$request->sponsor_phone,
            'sponsor_nationality'=>$request->sponsor_nationality,
            'attachment_file'=>json_encode($otherpic),
            'attachment_remark'=>$request->attachment_remark,
        ]);
        if($tenant){
            return redirect()->back()->with('success','Tenant has been created successfully.');
            }
            else{
                return redirect()->back()->with('error','Tenant not created.');
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
        //
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
        //
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
        $data=Tenant::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }

    public function tenantdocument($id)
    {
        $id = Crypt::decrypt($id);
        $document=Tenant::find($id);
        return view('admin.tenant.tenantdocument',compact('document'));
    }
    public function BuildingDetails($building_id){
        
        $res=Unit::where('building_id',$building_id)->get();
        $total_unit =Unit::where('building_id',$building_id)->count();
        dd($res);
        $html=' <option value="">--Select Unit--</option>';
    foreach($res as $r){
        $html .='<option value="'.$r->id.'">'.$r->unit_type.'</option>';
    }
    return response()->json(['html'=>$html,'total_unit'=>$total_unit]);
        }

    public function fileNumber($file_no){
        $max_id=Tenant::max('id')+1;
        $TT=$file_no.'-'.Carbon::now()->month.'-'.Carbon::now()->format('y').'-'.str_pad($max_id,2,'0',STR_PAD_LEFT);
        return response()->json($TT);

    }

    }

