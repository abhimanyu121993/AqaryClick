<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;


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
        $tenant=Tenant::create([

            'tenant_code'=>$request->tenant_code,
            'tenant_english_name'=>$request->tenant_english_name,
            'tenant_arabic_name'=>$request->tenant_arabic_name,
            'tenant_document'=>$request->tenant_document,
            'qid_document'=>$request->qid_document,
            'cr_document'=>$request->cr_document,
            'passport'=>$request->passport,
            'tenant_nationality'=>$request->tenant_nationality,
            'tenant_primary_mobile'=>$request->tenant_primary_mobile,
            'tenant_secondary_mobile'=>$request->tenant_secondary_mobile,
            'email'=>$request->email,
            'post_office'=>$request->post_office,
            'address'=>$request->tenant_address,
            'tenant_type'=>$request->tenant_type,
            'unit_type'=>$request->unit_type,
            'unit_address'=>$request->unit_address,
            'rental_period'=>$request->rental_period,
            'payment_method'=>$request->payment_method,
            'payment_receipt'=>$request->payment_receipt,
            'attachment_remark'=>$request->attachment_remark,
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

    public function tenantdocument($id)
    {
        $id = Crypt::decrypt($id);
        $document=Tenant::find($id);
        return view('admin.tenant.tenantdocument',compact('document'));
    }

    }

