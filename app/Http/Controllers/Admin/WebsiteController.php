<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\TermCondition;
use App\Models\WebsitePage;
use App\Models\WebsiteSetting;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function contactList(){
        $data=ContactUs::all();
        return view('admin.all_contact',compact('data'));
    }
    public function webSettingPages()
    {
        return view('admin.aboutUs.aboutus');
    }

    public function storeWebSettingPages(Request $request)
    {
        $request->validate([
            'file'=>'required'
        ]);
        if($request->hasFile('file'))
        {
            $upic='websetting-'.time().'-'.rand(0,99).'.'.$request->file->extension();
            $request->file->move(public_path('upload/websitepage/'),$upic);
            $pic_name = 'upload/websitepage/'.$upic;

        }
        $res=WebsitePage::UpdateOrCreate(['key'=>'file'],[
            'key'=>'file',
            'value'=>$pic_name
            ]);

    }

    public function storeTitle(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $res=WebsitePage::UpdateOrCreate(['key'=>'title'],[
            'key'=>'title',
            'value'=>$request->title
            ]);

    }

    public function storeAboutUs(Request $request)
    {
        $request->validate([
            'about_us'=>'required'
        ]);
        $res=WebsitePage::UpdateOrCreate(['key'=>'about_us'],[
            'key'=>'about_us',
            'value'=>$request->about_us
            ]);

    }

    public function storeDescription(Request $request)
    {
        $request->validate([
            'description'=>'required'
        ]);
        $res=WebsitePage::UpdateOrCreate(['key'=>'description'],[
            'key'=>'description',
            'value'=>$request->description
            ]);

    }

}
