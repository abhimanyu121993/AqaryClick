<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PharIo\Manifest\Url;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=Profile::get();
        return view('admin.agentsProfile.profile',compact('profile'));
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
            'full_name' => 'required',
            'agent_profile' => 'nullable',
            'email' => 'required',
            'phone' => 'required',
            'f_link' => 'required',
            'insta_link' => 'required',
            't_link' => 'required',
            'l_link' => 'required',
            'p_status' => 'required',
            'desc_agnt' => 'required',
            'desc_agnt_arabic'=>'required'
        ]);

            $pic_name = '';
            if($request->hasFile('agent_profile'))
            {
                $upic='agents-'.time().'-'.rand(0,99).'.'.$request->agent_profile->extension();
                $request->agent_profile->move(public_path('upload/profile/'),$upic);
                $pic_name = 'upload/profile/'.$upic;
            }
            $data = [
                'full_name' => $request->full_name,
                'file' => $pic_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook'=>$request->f_link,
                'instagram'=>$request->insta_link,
                'twiter'=>$request->t_link,
                'linkedin'=>$request->l_link,
                'profile_status'=>$request->p_status,
                'description'=>$request->desc_agnt,
                'description_arabic'=>$request->desc_agnt_arabic
            ];
            $user = Profile::create($data);
            if($user)
            {
                Session::flash('success', 'Profile registered successfully');
            }
            else
            {
                Session::flash('error', 'Profile not registered');
            }
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
        $profile=Profile::get();
        $pedit=Profile::find($id);
        return view('admin.agentsProfile.profile',compact('pedit','profile'));
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
        $pic_name = '';
        if($request->hasFile('agent_profile'))
        {
            $upic='agents-'.time().'-'.rand(0,99).'.'.$request->agent_profile->extension();
            $request->agent_profile->move(public_path('upload/profile/'),$upic);
            $pic_name = 'upload/profile/'.$upic;
        }
        $data = Profile::find($id)->update([
            'full_name' => $request->full_name,
            'file' => $pic_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook'=>$request->f_link,
            'instagram'=>$request->insta_link,
            'twiter'=>$request->t_link,
            'linkedin'=>$request->l_link,
            'profile_status'=>$request->p_status,
            'description'=>$request->desc_agnt,
            'description_arabic'=>$request->desc_agnt_arabic
        ]);
        if($data)
        {
            Session::flash('success', 'Profile Updated successfully');
        }
        else
        {
            Session::flash('error', 'Profile not Updated');
        }
    return redirect()->back();
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
        $data=Profile::find($id);
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
