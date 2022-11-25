<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Building;
use App\Models\Contract;
use App\Models\currency;
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
        $a=invoice::pluck('contract_id');
        $max_id=Invoice::max('id')+1;
        $INV='INV'.'-'.Carbon::now()->day.Carbon::now()->month.Carbon::now()->format('y').'-'.$max_id;
        $tenantDetails=Tenant::all();
        $building=Building::all();
        $bank=Bank::all();
        $currency=currency::where('status',1)->get();
return view('admin.invoice.add_invoice',compact('tenantDetails','INV','building','bank','currency'));  
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a=invoice::pluck('contract_id');
        $max_id=Invoice::max('id')+1;
        $INV='INV'.'-'.Carbon::now()->day.Carbon::now()->month.Carbon::now()->format('y').'-'.$max_id;
        $tenantDetails=Tenant::all();
        $building=Building::all();
        $bank=Bank::all();
        return view('admin.invoice.show_invoice',compact('tenantDetails','INV','building','bank'));  
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
        (float)$amt_paid=$request->amt_paid;
        $overdue = (int) filter_var($request->overdue_period, FILTER_SANITIZE_NUMBER_INT);
           $due_amt=Contract::where('id',$request->contract_id)->first()->rent_amount;
           $inv_due=Invoice::where('contract_id',$request->contract_id)->latest()->first()->due_amt;
           $due_amt=$inv_due+$due_amt;
           $due_amt=(float)$due_amt-$amt_paid; 
           $data= Invoice::create([
            'tenant_id' => $request->tenant_id,
            'contract_id' => $request->contract_id,
            'invoice_no' => $request->invoice_no,
            'due_date' => $request->due_date,
            'invoice_period_start' => $request->invoice_period_start,
            'invoice_period_end' => $request->invoice_period_end,
            'amt_paid' => $request->amt_paid,
            'due_amt'=>$due_amt,
            'payment_method' => $request->payment_method,
            'cheque_no' => $request->cheque_no,
            'account_no' => $request->payment_method,
            'bank_name' => $request->bank_name,
            'payment_status' => $request->payment_status,
            'overdue_period'=>$overdue,
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
        $html=' <option value="" selected hidden disabled>--Select Contract--</option>';   
        foreach($res as $r){
            $html .='<option value="'.$r->id.'">'.$r->contract_code.'('.$r->tenantDetails->building_name.')'.'</option>';
        }
        return response()->json($html);
        }
        public function tenantBuilding($building_id){
            if($building_id=='all'){
                $res=Tenant::all();
                $html=' <option value=""selected hidden disabled> --Select Tenant--</option>';   
                foreach($res as $r){
                    $html .='<option value="'.$r->id.'">'.$r->tenant_english_name.'</option>';
                }
            }
            else{
            $res=Tenant::where('building_name',$building_id)->get();
            $html=' <option value=""selected hidden disabled>--Select Tenant--</option>';   
            foreach($res as $r){
                $html .='<option value="'.$r->id.'">'.$r->tenant_english_name.'</option>';
            }
            }
            return response()->json($html);
        }
        public function invoiceDetails($contract_id){
            $res=Contract::where('id',$contract_id)->first();
            $inv=invoice::where('contract_id',$contract_id)->latest('invoice_period_end')->first();
            $invoicedate=strtotime($inv->invoice_period_end??0);
            $leaseEnddate=strtotime($res->lease_end_date);

if($invoicedate > $leaseEnddate)
{
$msg="Sorry! This Contract has been Expire.";
$invoiceEnd='';
$invoiceStart='';
$payable='';
$due_amt='';
$rent_amt='';
$lastmonth='';
}
else{  
$invoice=$inv->invoice_period_end??null;
            if($invoice==!null){
                $invoiceStart=$invoice;
                $invoiceEnd=Carbon::parse($invoice)->addMonth(1)->addDay(-1)->format('Y-m-d');
                $msg='';
                $lastmonth=Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('Y-m-d');
               
                $payable=$res->rent_amount+$inv->due_amt;
                $due_amt=$inv->due_amt;
                $rent_amt=$res->rent_amount;
            }else{
                $invoiceStart=$res->lease_start_date;
                $invoiceEnd=Carbon::parse($res->lease_start_date)->addMonth(1)->addDay(-1)->format('Y-m-d');
                $lastmonth=Carbon::parse($res->lease_end_date)->addMonth(-1)->addDay(1)->format('Y-m-d');
                $msg='';
                $payable=$res->rent_amount+$inv->due_amt;
                $due_amt=$inv->due_amt;
                $rent_amt=$res->rent_amount;


            }
        }
        $overdue = Carbon::parse(Carbon::now())->diffInDays($invoiceEnd);

           return response()->json(array('res'=>$res,'invoiceEnd'=>$invoiceEnd,'invoiceStart'=>$invoiceStart,'msg'=>$msg,'payable'=>$payable,'due_amt'=>$due_amt,'rent_amt'=>$rent_amt,'lastmonth'=>$lastmonth,'overdue'=>$overdue) );
            }

            public function printInvoice(){
                return view('admin.invoice.invoice_details');
            }
    public function duePayment($contract_id){
        $res=invoice::where('contract_id',$contract_id)->latest()->first();
        $overdue = Carbon::parse(Carbon::now())->diffInDays($res->invoice_period_end);
        return response()->json(array('res'=>$res,'overdue'=>$overdue) );
    }
}
