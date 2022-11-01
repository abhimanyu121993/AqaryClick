<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Contract;
use App\Models\Electricity;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $build=Building::all();
        $electric_invoice=Electricity::latest()->first();
        $electric=Electricity::all();
        return view('admin.electricity.electric',compact('electric','build','electric_invoice'));  
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $electric_invoice=Electricity::latest()->first();
        $electric=Electricity::all();
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
        $request->validate([
            'building_name'=>'required',
            'unit_no'=>'required',
            'unit_type'=>'required',
            'electric_under'=>'required',
            'name'=>'required',
            'qid_no'=>'required',
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
        $electric_invoice=Electricity::latest()->first();
        $electric=Electricity::all();
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
        $res=Unit::where('id',$building_id)->get();
        $html='<option value="">--Select Unit No--</option>';
        foreach($res as $r){
            $html .='<option value="'.$r->unit_no.'">'.$r->unit_no.'</option>';
        }

        $html1='<option value="">--Select Unit Type--</option>';
        foreach($res as $r){
            $html1 .='<option value="'.$r->unit_type.'">'.$r->unit_type.'</option>';
        }

        $result=Electricity::where('building_name',$building_id)->first();
        if($result==!null){
            $result=Carbon::parse($result->created_at)->format('d-m-Y') ;
        }
        return response()->json(array('html'=>$html,'html1'=>$html1,'result'=>$result));    
}
        public function fetchTenantName(){
            $res=Tenant::pluck('tenant_english_name');
            $html='<option value="">--Select Tenant Name--</option>';
            foreach($res as $r){
                $html .='<option value="'.$r.'">'.$r.'</option>';
            }
            
            return response()->json($html);
            }
            public function fetchContract(){
                $res=Contract::pluck('lessor');
                $html='<option value="">--Select Lessor Name--</option>';
                foreach($res as $r){
                    $html .='<option value="'.$r.'">'.$r.'</option>';
                }
                return response()->json($html);
                }

                public function fetchQid($name){
                    $res=Tenant::where('tenant_english_name',$name)->first('qid_document');
                    return response()->json($res);
                    }
                    public function getDownload($path){
                        $filePath = public_path('upload/electricity_doc/'.$path);
                       return Response::download($filePath);
                    }
                
}
