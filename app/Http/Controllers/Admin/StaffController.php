<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=Staff::all();
        return view('admin.settings.staff',compact('units'));
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
dd($request);
        $request->validate([
        ]);
       $data= Staff::create([
        'fname' => $request->fname,
        'lname'=> $request->lname,
        'mobile'=> $request->mobile,
        'email'=> $request->email,
            ]);
        if($data){
        return redirect()->back()->with('success','Staff has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Staff not created.');
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
        $staff=Staff::find($id);
        $units=Staff::all();
        return view('admin.settings.staff',compact('staff','units'));
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
        ]);
        $data=Staff::find($id)->update([
            'fname' => $request->fname,
            'lname'=> $request->lname,
            'mobile'=> $request->mobile,
            'email'=> $request->email,

        ]);
        if($data)
        {
        return redirect()->back()->with('success','Staff Updated successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Staff not created.');
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
        $data=Staff::find($id);
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
