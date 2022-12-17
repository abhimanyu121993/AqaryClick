<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\currency;
use Yajra\DataTables\Facades\DataTables;
use AmrShawky\LaravelCurrency\Facade\Currency as amcurrency;

use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencyDetails=Currency::all();
        return view('admin.settings.currency',compact('currencyDetails'));
    }
    public function getCurrency(Request $request)
    {


        if ($request->ajax()) {
            $data = Currency::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('statuscontrol',function($row){
                    $acb="<div class='form-check form-check-primary form-switch'><input type='checkbox' id='is_active' class='form-check-input is_active' ";
                    $acb .=$row->status?'checked ':'';
                    $acb .="value='$row->id'";
                    $acb .="></div>";
                    return $acb;
                })
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                ->rawColumns(['action','statuscontrol'])
                ->make(true);
        }
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
        //
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
        //
    }

    public function isActiveCurrency($id)
    {
        $ass_active=Currency::find($id);

        if($ass_active->status==1)
        {
            $ass_active->status=0;
        }else
        {
            $ass_active->status=true;
        }
        if($ass_active->update()){
           return 1;
        }
        else
        {
           return 0;

        }
    }

    public function convertAmtInSar(Request $request)
        {
            $code= $request->currency_code;
            $amt=str_replace(',','',$request->cheque_amt);
     $res=amcurrency::convert()->from($code)->to('QAR')->amount($amt)->get();

     return response()->json($res);
    }
    public function fetchCurrency(){
        $res=Currency::where('status',1)->get();
        $html=' <option value="">Select Currency</option>';

        foreach($res as $r){
            $html .='<option value="'.$r->code.'">'.$r->code.'</option>';
        }
        return response()->json($html);
        }

        public function convertAmtInSarDt($code,$amt)
        {
           
            $res=amcurrency::convert()->from($code)->to('QAR')->amount($amt)->get();
            return $res;
        }
}
