<?php

namespace App\Console\Commands;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Console\Command;

class overdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'overdue:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the value of overdue';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $res=Contract::pluck('lease_end_date');
       foreach($res as $r){
        $formatted_dt1=Carbon::now();
        $formatted_dt2=Carbon::parse($r);
        $date_diff=$formatted_dt1->diffInDays($formatted_dt2);
        Contract::whereDate('lease_end_date','>',Carbon::now())->update(['overdue'=>$date_diff]);
       }

        return Command::SUCCESS;
    }
}
