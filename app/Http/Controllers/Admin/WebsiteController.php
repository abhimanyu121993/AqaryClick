<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $data=WebsiteSetting::get();
        return view('admin.websitesettings',compact('data'));
    }
    public function setting_update(Request $req)
    {
        
        foreach($req->except('_token') as $k=>$dt){
            
            if($req->hasFile($k)){
                $n='web-'.time().'-'.rand(0,9999).'.'.$dt->extension();
                $file=$req->file($k);
               $a= $file->move(public_path('upload/website'),$n);
                $dt=$n;
            }
                WebsiteSetting::where('name',$k)->update(['value'=>$dt]);
        }
        return redirect()->back();
    }
}
