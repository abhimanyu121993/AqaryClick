<?php

namespace App\Console\Commands;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Overdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Overdue:update';

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
    
       $contracts=Contract::where('expire',0)->get();
       foreach($contracts as $c){
       $res= $c->last_paid_invoice;
       if($res){
        if(Carbon::parse($c->lease_start_date)->gte(Carbon::parse($res))){
            Contract::where('id',$c->id)->update(['expire',1]);
            return 0;
        }
        $LastPaid=Carbon::parse($res)->addMonths(1)->addDay(-1);
        if(Carbon::now()->gte($LastPaid)){
            $diffDays=Carbon::now()->diffInDays($LastPaid);
            Contract::where('id',$c->id)->update(['overdue'=>$diffDays]);
          }
       }
       else
       {
      $Od=Carbon::parse($c->lease_start_date)->addMonths(1)->addDay(-1);
      if(Carbon::now()->gte($Od)){
        $diffDays=Carbon::now()->diffInDays($Od);
        Contract::where('id',$c->id)->update(['overdue'=>$diffDays]);
      }  
       }
       }
    
    
       
    }
}
