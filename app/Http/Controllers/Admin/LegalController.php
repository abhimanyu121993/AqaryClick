<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenantDetail=Tenant::all();   
return view ('admin.legal.register',compact('tenantDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $legalDetail=Legal::all();
        return view ('admin.legal.all_legal',compact('legalDetail'));
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
            // 'tenant_name' => 'required',
            // 'mobile_no' => 'required',
            // 'unit_ref' => 'required',


        ]);
        $otherpic=[];
        if($request->hasFile('attachment_file'))
        {
            foreach($request->file('attachment_file') as $file)
            {
                $name='legal-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/legal_doc'),$name);
                $otherpic[]=$name;
            }
        }
       $data= Legal::create([
            'tenant_name' => $request->tenant_name,
            'tenant_mobile' => $request->mobile_no,
            'unit_ref' => $request->unit_ref,
            'status' => $request->status,
            'file' =>json_encode($otherpic),
            'remark' => $request->remark,


        ]);
        if($data){
        return redirect()->back()->with('success','Legal has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Legal not created.');
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
        
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
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
            'name' => 'required',
        ]);
        $otherpic=Legal::find($id)->file??[];
        if($request->hasFile('attachment_file'))
        {
            foreach($request->file('attachment_file') as $file)
            {
                $name='legal-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/legal_doc'),$name);
                $otherpic[]=$name;
            }
        }
        if(count($otherpic)>0)
                 {
                    Legal::find($id)->update(['file'=>json_encode($otherpic)]);
                    
                 }
       $data= Legal::find($id)->update([
        'tenant_name' => $request->tenant_name,
        'tenant_mobile' => $request->mobile_no,
        'unit_ref' => $request->unit_ref,
        'remark' => $request->remark,
        'status' => $request->status,
        'file' =>json_encode($otherpic),
        ]);
        if($data){
        return redirect()->back()->with('success','Legal has been Updated successfully.');
        }
        else{
            return redirect()->back()->with('error','Legal not Updated.');
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
        $data=Legal::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }    
    }
    public function fetchData($tenant_id){

        $res=Tenant::where('id',$tenant_id)->first();
        return response()->json($res);
        }

        public function alllegal(Request $request)
        {
            // $otherpic=Legal::find($request->lid)->file??'';
            // {
            //     foreach($request->file('attachment_file') as $file)
            //     {
            //         $name='legal-'.time().'-'.rand(0,99).'.'.$file->extension();
            //         $file->move(public_path('upload/legal_doc'),$name);
            //         $otherpic[]=$name;
            //     }
            //     dd($otherpic);
            // }
            // if(count($otherpic) > 0)
            //          {
            //             Legal::find($request->lid)->update(['file'=>json_encode($otherpic)]);
                        
            //          }
            $res = Legal::find($request->lid)->update([
                'status' => $request->status,
                'remark' => $request->remark,
        
        ]);
            if($res){
                session()->flash('success','Legal Updated sucessfully');
                return redirect()->back();
            }

}
        }
