<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cheque;
use App\Models\Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                'tenant_name' => 'required',
                'contract' => 'required',
                'invoice_no'=>'required',
        ]);
        try {
            for ($i = 0; $i < count($request->cheque_no); $i++) {
                $mainpic = [];
                if ($request->hasFile('file')) {
                    foreach ($request->file('file') as $file) {
                        $name = $request->invoice_no . '-' . time() . '-' . rand(0, 99) . '.' . $file->extension();
                        $file->move(public_path('upload/cheque_doc/file'), $name);
                        $mainpic[] = $name;
                    }
                }
                $res = Cheque::create(['invoice_no' => $request->invoice_no, 'tenant_id' => $request->tenant_name,'contract_id' => $request->contract, 'currency' => $request->currency[$i] ?? '', 'qar_amt' => $request->sar_amt[$i] ?? '', 'deposite_date' => $request->deposite_date[$i] ?? '', 'cheque_amt' => $request->cheque_amt[$i] ?? '', 'cheque_no' => $request->cheque_no[$i] ?? '', 'bank_name' => $request->cheque_bank_name[$i] ?? '', 'cheque_status' => $request->cheque_status[$i] ?? '', 'attachment' => $mainpic[$i] ?? '', 'remark' => $request->cheque_remark[$i] ?? '']);
            }
            if ($res) {
                Session::flash('success', 'Cheque Details Added Successfully');
            } else {
                Session::flash('error', 'Something Went Wrong');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Server Error');
            $url = URL::current();
            Error::create(['url' => $url, 'message' => $ex->getMessage()]);
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

}
