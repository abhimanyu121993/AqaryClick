<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Error;
use App\Models\Invoice;
use App\Models\Tenant;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenantDetails=Contract::where('status',0)->get();
return view('admin.invoice.add_invoice',compact('tenantDetails'));  
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoice.show_invoice');  
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
            'name' => 'nullable',
        ]);
        $otherpic=[];
        if($request->hasFile('attachment'))
        {
            foreach($request->file('attachment') as $file)
            {
                $name='Inv-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/invoice_doc'),$name);
                $otherpic[]=$name;
            }

        }
        $invoice_no='INV-'.rand(0,99).'-'.rand(0,99);

       $data= Invoice::create([
             'tenant_id' => $request->tenant_id,
              'contract_id' => $request->contract_id,
            'invoice_no' => $invoice_no,
            'due_date' => $request->due_date,
            'invoice_period_start' => $request->invoice_period_start,
            'invoice_period_end' => $request->invoice_period_end,
            'amt_paid' => $request->amt_paid,
            'payment_method' => $request->payment_method,
            'cheque_no' => $request->cheque_no,
            'account_no' => $request->payment_method,
            'bank_name' => $request->bank_name,
            'payment_status' => $request->payment_status,
            'overdue_period'=>$request->overdue_period,
            'remark'=>$request->remark,
            'attachment'=>json_encode($otherpic),
            

        ]);
        if($data){
        return redirect()->back()->with('success','Invoice has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Invoice not created.');
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

    public function storekeyproductDetail(Request $req)
    {
        $req->validate([
        'title.*'=>'required',
        'val.*'=>'required',

    ]);
        try{
            for($i=0;$i<count($req->title);$i++)
            {


                $res=Invoice::create(['product_id'=>$req->pid,'title'=>$req->title[$i],'value'=>$req->val[$i]]);
            }
            if($res)
            {
                Session::flash('success','Product Details Add');
            }
            else
            {
                Session::flash('error','Something Went Wrong');
            }
        }
        catch(Exception $ex)
        {
            Session::flash('error','Server Error');
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);

        }
        return redirect()->back();
    }

    public function contractDetails($tenant_id){
        $res=Contract::with('tenantDetails')->where('tenant_name',$tenant_id)->get();
        $html=' <option value="">--Select Contract--</option>';   
        foreach($res as $r){
            $html .='<option value="'.$r->id.'">'.$r->contract_code.'('.$r->tenantDetails->buildingDetails->name.')'.'</option>';
        }
        return response()->json($html);
        }
        public function invoiceDetails($contract_id){
            $res=Contract::where('id',$contract_id)->first();
        //    $overdue=diffInDays(Carbon::now(),$res->lease_end_date);
           $formatted_dt1=Carbon::now();
           $formatted_dt2=Carbon::parse($res->lease_end_date);
           $date_diff=$formatted_dt1->diffInDays($formatted_dt2);
           return response()->json(array('res'=>$res,'overdue'=>$date_diff));
            }
}
