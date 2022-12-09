<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\Tenant;
use App\Models\User;
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
    protected $signature = 'command:EverydayNotification';

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
                    'title'=>'Contract contract_code is expire soon'.$contractCode,
                    'body'=>'Attension Please Your Contract is Expire in $contract->overdue days',
                ];

                $contractUser=$contract->user_id;
                $user=User::find($contractUser);
                Notification::send($user, new AlertNotification($details)); 

                $tenantName=$contract->tenant_name;
                $tenantUser=Tenant::find($tenantName);
                Notification::send($tenantUser, new AlertNotification($details)); 
                

            }
        }
        return Command::SUCCESS;
    }
}
