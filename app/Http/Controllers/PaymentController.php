<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway=Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function charge($id)
    {
        $data=Membership::find($id);

        if($data){
            try{
                $response=$this->gateway->purchase([
                    'amount'=>$data->price,
                    'currency'=>env('PAYPAL_CURRENCY'),
                    'returnUrl'=>route('paypal.success'),
                    'cancelUrl'=>route('paypal.error'),
                ])->send();
                if($response->isRedirect()){
                    $response->redirect();
                }
                else
                {
                    return $response->getMessage();
                }
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }
        }
        else
        {
            return 'no pack found';
        }
    }

    public function success(Request $req)
    {
        if($req->input('paymentId') && $req->input('PayerID')){
            $transaction=$this->gateway->completePurchange([
                'payer_id'=>$req->PayerID,
                'transactionReference'=>$req->paymentId
            ]);
            $response=$transaction->send();
            if($response->isSuccessfull()){
                    // customer paid successfully
                    $arr_body=$response->getData();
                    $res=Payment::create(
                        [
                            'payment_id'=>$arr_body['id'],
                            'payer_id'=>$arr_body['payer']['payer_info']['payer_id'],
                            'payer_email'=>$arr_body['payer']['payer_info']['email'],
                            'amount'=>$arr_body['transactions'][0]['amount']['total'],
                            'currency'=>env('PAYPAL_CURRENCY'),
                            'payment_status'=>$arr_body['state']
                        ]
                    );
                    return 'Payment done'.json_encode($res);
            }
            else
            {
                return $response->getMessage();
            }
        }
        else
        {
            return 'Transaction is declined';
        }
    }

    public function error()
    {
        return 'User Cancel Payment';
    }
}
