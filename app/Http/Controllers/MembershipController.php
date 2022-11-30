<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member=Membership::get();
        return view('admin.member.membership',compact('member'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'icon' => 'required',
            'desc' => 'required',
            'user_count' => 'nullable',
            'bg_color' => 'required',
            'is_active' => 'required',
            'price' => 'required'
        ]);
        $mainpic='';
        if($req->hasFile('icon')){
            $mainpic='membership-'.time().'-'.rand(0,99).'.'.$req->icon->extension();
            $req->icon->move(public_path('upload/membership'),$mainpic);
        }
        $con = Membership::create([ 'title' => $req->title, 'icon' =>$mainpic,
            'description' => $req->desc,
            'user_count' => $req->user_count,
            'text_color' => $req->txt_color,
            'bgcolor' => $req->bg_color,
            'is_active' => $req->is_active,
            'price' => $req->price
        ]);



        if($con){
            return redirect()->back()->with('success', 'Membership Created successfully');
        }
        else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member=Membership::get();
        $edit=Membership::find($id);
        return view('admin.member.membership',compact('member','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $mainpic=Membership::find($id)->icon??'';
        if($request->hasFile('icon')){
            $mainpic='membership-'.time().'-'.rand(0,99).'.'.$request->icon->extension();
            $request->icon->move(public_path('upload/membership'),$mainpic);
            $oldpic = Membership::find($id)->pluck('icon')[0];
            File::delete(public_path('upload/membership/' . $oldpic));
        }
        $data= Membership::find($id)->update([
            'title' => $request->title, 'icon' =>$mainpic,
            'description' => $request->desc,
            'user_count' => $request->user_count,
            'text_color' => $request->txt_color,
            'bgcolor' => $request->bg_color,
            'is_active' => $request->is_active,
            'price' => $request->price
        ]);
        if($data){
            return redirect()->back()->with('success', 'Membership Updated successfully');
        }
        else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Membership::find($id)->delete();
        return back();
    }
}
