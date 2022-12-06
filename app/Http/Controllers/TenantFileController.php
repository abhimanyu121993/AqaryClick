<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        for ($i = 0; $i < count($request->file_name); $i++) {
            if($request->file_name[$i]!= null){ 
            $mainpic = [];
            if ($request->hasFile('attachment_file')) {
                foreach ($request->file('attachment_file') as $file) {
                    $name = $request->tenant_code[$i] . '-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
                    $file->move(public_path('upload/tenant/files'), $name);
                    $mainpic[] = $name;
                }
            }
            $res = TenantFile::create(['user_id' => Auth::user()->id,'tenant_id' => $request->tenant_code[$i], 'file_name' => $request->file_name[$i] ?? '', 'attachment' => $mainpic[$i] ?? '']);
            if ($res) {
                return redirect()->back()->with('success', 'File created successfully.');
            } else {
                return redirect()->back()->with('error', 'File not created.');
            }
        }
    }    }

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
