<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nation=Nationality::all();
        return view('admin.settings.nationality',compact('nation'));  
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
            'name' => 'required',
            'currency_code'=>'required',
        ]);
       $data= Nationality::create([
            'name' => $request->name,
            'currency_code' => strtoupper($request->currency_code),
            'percentage'=>$request->percentage,
        ]);
        if($data){
        return redirect()->back()->with('success','Country has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Country not created.');
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
        $id = Crypt::decrypt($id);
        $nation=Nationality::all();
        $nationality=Nationality::find($id);
        return view('admin.settings.nationality',compact('nation','nationality'));   
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
            'currency_code'=>'required',
        ]);
       $data= Nationality::find($id)->update([
        'name' => $request->name,
        'currency_code' => strtoupper($request->currency_code),
        'percentage'=>$request->percentage,
        ]);
        if($data){
        return redirect()->back()->with('success','Nationality has been Updated successfully.');
        }
        else{
            return redirect()->back()->with('error','Nationality not Updated.');
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
        $data=Nationality::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }    }
}
