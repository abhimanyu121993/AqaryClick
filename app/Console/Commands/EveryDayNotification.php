<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Legal;
use Illuminate\Support\Carbon;
use App\Notifications\AlertNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class EveryDayNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notification:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification on contract expire before 2 month, 1 month , 15 days, 7 days, 3 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $contracts=Contract::where('expire',0)->get();
        foreach($contracts as $contract){
            if($contract->overdue==62 || $contract->overdue==30 || $contract->overdue==15 || $contract->overdue==7 || $contract->overdue==3)
            {
                // Contract contract_code is expire soon
                // Attension Please Your Contract is Expire in $contract->overdue days
                 $contractCode=$contract->contract_code;
                $details=[
                    'title'=>'Contract contract_code is expire soon'.' '.$contractCode,
                    'body'=>'Attension Please Your Contract is Expire in'.' '.$contract->overdue.' '.'days',
                ];

                $contractUser=$contract->user_id;
                if( $contractUser !=''){
                $user=User::find($contractUser);
                Notification::send($user, new AlertNotification($details)); 
                }

                $tenantName=$contract->tenant_name;
                if($tenantName !=''){
                $tenantUser=Tenant::find($tenantName);
                Notification::send($tenantUser, new AlertNotification($details)); 
                }

            }


            
            if(Carbon::parse($contract->lease_end_date)->subDays(62) || Carbon::parse($contract->lease_end_date)->subDays(30)|| Carbon::parse($contract->lease_end_date)->subDays(15) || Carbon::parse($contract->lease_end_date)->subDays(7) || Carbon::parse($contract->lease_end_date)->subDays(3)){

                $leaseDate=$contract->lease_end_date;

                $details=[
                    'title'=>'Contract Lease is expire date soon'.' '.$leaseDate,
                    'body'=>'Attension Please Your Contract Lease is Expire Date in'.' '.$contract->lease_end_date.' '.'Date',
                ];

                $contractUser=$contract->user_id;
                if( $contractUser !=''){
                $user=User::find($contractUser);
                Notification::send($user, new AlertNotification($details)); 
                }


                $tenantName=$contract->tenant_name;
                if($tenantName !=''){
                    $tenantUser=Tenant::find($tenantName);
                    Notification::send($tenantUser, new AlertNotification($details)); 
                }
            }
        }


        $res=Invoice::where('payment_status','Paid')->pluck('contract_id');
        $contractsDetails=Contract::where('overdue','>=',90)->whereNotIn('id',$res)->get();
        if($contractsDetails){
            foreach ($contractsDetails as $contractDetail) {
                $data=Legal::firstOrCreate([
                    'user_id'=>$contractDetail->user_id,
                    'contract_id'=>$contractDetail->id,
                    'tenant_name'=>$contractDetail->tenantDetails->tenant_english_name,
                    'tenant_mobile'=>$contractDetail->tenant_mobile,
                    'unit_ref'=>$contractDetail->tenantDetails->unit->unit_ref,
                ]);
            }
        }
        
        
        return Command::SUCCESS;
    }
}
