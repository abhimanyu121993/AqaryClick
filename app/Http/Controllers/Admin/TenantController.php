<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tenant.tenantregister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_tenant=Tenant::get();
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
                'attachment_file' => 'nullable',
                'file_number' => 'nullable',
                'tenant_code' => 'nullable',
                'customer_type'=>'nullable',
                'primary_phone' => 'nullable',
                'secondary_phone'=>'nullable',
                'email'=>'nullable',
                'post_office'=>'nullable',
                'address'=>'nullable',
                'account_number'=>'nullable',

                'tenant_status'=>'nullable',
                'document_name'=>'nullable',
                'total_unit'=>'nullable',
                'customer_nationality'=>'nullable',
                'sponsor_name'=>'nullable',
                'sponsor_email'=>'nullable',
                'sponsor_phone'=>'nullable',
                'sponsor_oid'=>'nullable',
                'attachment_remark'=>'nullable',
                'tenat_document'=>'nullable',
                'oid_document'=>'nullable',
                'cr_document'=>'nullable',
                'passcode'=>'nullable'
            ]);

        $otherpic='[]';
        if($request->hasFile('attachment_file'))
                    {
                        foreach($request->file('attachment_file') as $file)
                        {
                            $name='attachment-'.time().'-'.rand(0,99).'.'.$file->extension();
                            $file->move(public_path('upload/tenant'),$name);
                            $otherpic=$name;
                        }
                    }
        $tenant=Tenant::create([
            'tenant_name'=>$request->tenant_name,
            'file_number'=>$request->file_number,
            'tenant_code'=>$request->tenant_code,
            'customer_type'=>$request->customer_type,
            'primary_phone'=>$request->primary_phone,
            'secondary_phone'=>$request->secondary_phone,
            'email'=>$request->email,
            'post_office'=>$request->post_office,
            'address'=>$request->address,
            'tenant_status'=>$request->tenant_status,
            'document_name'=>$request->document_name,
            'total_unit'=>$request->total_unit,
            'customer_nationality'=>$request->customer_nationality,
            'sponsor_name'=>$request->sponsor_name,
            'sponsor_email'=>$request->sponsor_email,
            'sponsor_phone'=>$request->sponsor_phone,
            'sponsor_oid'=>$request->sponsor_oid,
            'attachment_remark'=>$request->attachment_remark,
            'tenant_document'=>$request->tenant_document,
            'oid_document'=>$request->oid_document,
            'cr_document'=>$request->cr_document,
            'passcode'=>$request->passcode,
            'attachment_file'=>json_encode($otherpic)
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
    }

