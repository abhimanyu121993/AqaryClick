<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class TenantFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenantcode=Tenant::all();
        $files=TenantFile::all();
    return view('admin.tenant.tenant_file',compact('tenantcode','files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'file_name*' => 'required',
        ]);
        $files=$request->attachment_file;
    foreach ($request->tenant_code as $k=>$tcode)
     {
         $name=$tcode.'-'.time().'-'.rand(0,9).'.'.$files[$k]->extension();
        $res = TenantFile::create(['user_id' => Auth::user()->id,'tenant_id' => $tcode, 'file_name' => $request->file_name[$k] ?? '', 'attachment' => $name ?? '']);
        
    } 
    Session::flash('success','File Uploaded Successfully');
    return redirect()->back();   
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
        $data=TenantFile::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }    }
}
