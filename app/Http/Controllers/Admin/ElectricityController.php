<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Contract;
use App\Models\Electricity;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\UnitStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class ElectricityController extends Controller
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
        
        if(Auth::user()->hasRole('superadmin')){
            $build=Building::all();
            $electric_invoice=Electricity::latest()->first();
            $electric=Electricity::all();
        }
        else{
            $build=Building::where('user_id',$this->user_id)->get();
            $electric_invoice=Electricity::where('user_id',$this->user_id)->latest()->first();
            $electric=Electricity::where('user_id',$this->user_id)->get();

        }
      
        return view('admin.electricity.electric',compact('electric','build','electric_invoice'));  
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
            $electric_invoice=Electricity::latest()->first();
            $electric=Electricity::all();
        }
        else{
            $electric_invoice=Electricity::where('user_id',$this->user_id)->latest()->first();
            $electric=Electricity::where('user_id',$this->user_id)->get();
        }
        return view('admin.electricity.all_electricity',compact('electric','electric_invoice'));  
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
            'building_name'=>'required',
            'unit_no'=>'required',
            'unit_type'=>'required',
            'electric_under'=>'required',
            'name'=>'required',
            // 'qid_no'=>'required',
            'reg_mobile'=>'required',
            'electric_no'=>'required',
            'water_no'=>'required',
            'bill_amt'=>'required',
            'last_payment'=>'required',
            'paid_by'=>'required',

            
        ]);
        $otherpic=[];
        if($request->hasFile('attachment'))
        {
            foreach($request->file('attachment') as $file)
            {
                $name='build-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/electricity_doc'),$name);
                $otherpic[]=$name;
            }
        }
       $data= Electricity::create([
        'user_id'=>$this->user_id,
        'building_name' => $request->building_name,
        'unit_no'=> $request->unit_no,
        'unit_type'=> $request->unit_type,
        'electric_under'=> $request->electric_under,
        'name'=>$request->name,
        'qid_no'=>$request->qid_no,

        'est_no'=>$request->est_no,
        'cr_no'=>$request->cr_no,
        'govt_housing'=>$request->govt_housing,
        'passport_no'=>$request->passport_no,

        'reg_mobile'=>$request->reg_mobile,
        'electric_no'=>$request->electric_no,
        'water_no'=>$request->water_no,
        'bill_amt'=>$request->bill_amt,
        'last_payment'=>$request->last_payment,
        'paid_by'=>$request->paid_by,
        'file'=>json_encode($otherpic),
        'auth_paid'=>$request->auth_paid,
        'remark'=>$request->remark,
            ]);
        if($data){
        return redirect()->back()->with('success','Electricity has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Electricity not created.');
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
        $electricity=Electricity::find($id);
        $this->getUser();
        
        if(Auth::user()->hasRole('superadmin')){
            $electric_invoice=Electricity::latest()->first();
            $electric=Electricity::all();
        }
        else{
            $electric_invoice=Electricity::where('user_id',$this->user_id)->latest()->first();
            $electric=Electricity::where('user_id',$this->user_id)->get();
        }
        return view('admin.electricity.electric',compact('electricity','electric','electric_invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {            $request->validate([
        'building_name'=>'required',
            'unit_no'=>'required',
            'unit_type'=>'required',
            'electric_under'=>'required',
            'name'=>'required',
            'qid_no'=>'required',
            'reg_mobile'=>'required',
            'electric_no'=>'required',
            'last_payment'=>'required',
            'water_no'=>'required',
            'bill_amt'=>'required',
            'paid_by'=>'required',
        ]);
        $otherpic=Building::find($id)->building_file??[];
        if($request->hasFile('attachment'))
        {
            foreach($request->file('attachment') as $file)
            {
                $name='build-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/electricity_doc'),$name);
                $otherpic[]=$name;
            }
        }
        if(count($otherpic)>0)
                 {
                    Building::find($id)->update(['pics'=>json_encode($otherpic)]);
                    
                 }
        $data=Electricity::find($id)->update([
            'building_name' => $request->building_name,
            'unit_no'=> $request->unit_no,
            'unit_type'=> $request->unit_type,
            'electric_under'=> $request->electric_under,
            'name'=>$request->name,
            'qid_no'=>$request->qid_no,
            'reg_mobile'=>$request->reg_mobile,
            'electric_no'=>$request->electric_no,
            'water_no'=>$request->water_no,
            'bill_amt'=>$request->bill_amt,
            'last_payment'=>$request->last_payment,
            'paid_by'=>$request->paid_by,
            'auth_paid'=>$request->auth_paid,
            'remark'=>$request->remark,
        ]);
        if($data)
        {
        return redirect()->back()->with('success','Electricity Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Electricity not created.');
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
        $data=Electricity::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }
    }

    public function fetchUnit($building_id){
        $res=Unit::where('building_id',$building_id)->get();
        $html='<option value="">--Select Unit No--</option>';
        foreach($res as $r){
            $html .='<option value="'.$r->id.'"';
            $html .=$r->unit_status==UnitStatus::where('name','vacant')->first()->id?'': 'disabled ';
            $html .='>'.$r->unit_no.' ('.UnitStatus::find($r->unit_status)->name.')'.'</option>';
        }

        $html1='<option value="">--Select Unit Type--</option>';
        foreach($res as $r){
            $html1 .='<option value="'.$r->unit_type.'">'.$r->unittypeinfo->name.'</option>';
        }

        $result=Electricity::where('building_name',$building_id)->first();
        if($result==!null){
            $result=Carbon::parse($result->created_at)->format('d-m-Y') ;
        }
        return response()->json(array('html'=>$html,'html1'=>$html1,'result'=>$result));    
}
        public function fetchTenantName(){
        $this->getUser();
        if (Auth::user()->hasRole('superadmin')) {
            $res = Tenant::pluck('tenant_english_name');
        }
        else
        {
            $res = Tenant::where('user_id',$this->user_id)->get()->pluck('tenant_english_name');
        }
            $html='<option value="">--Select Tenant Name--</option>';
            foreach($res as $r){
                $html .='<option value="'.$r.'">'.$r.'</option>';
            }
            
            return response()->json($html);
            }
            public function fetchContract(){

                $this->getUser();
                if (Auth::user()->hasRole('superadmin')) {
                    $res = Contract::with('customer')->get();
                }
                else
                {
                    $res =Contract::with('customer')->where('user_id',$this->user_id)->get()->pluck('lessor');
                }
                $html='<option value="">--Select Lessor Name--</option>';
                foreach($res as $r){
                    $html .='<option value="'.$r->customer->id.'">'.$r->customer->first_name.'</option>';
                }
                return response()->json($html);
                }

                public function fetchQid($name){
                    $res=Tenant::where('tenant_english_name',$name)->first();
                    return response()->json($res);
                    }
                    public function getDownload($path){
                        $filePath = public_path('upload/electricity_doc/'.$path);
                       return Response::download($filePath);
                    }
                    public function ImportExportElectricity(){
                        return view('admin.electricity.import_export');
                    }
}
