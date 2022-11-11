<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Mail\Mailables\Content;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function Contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
    public function getTotalBalanceAttribute(){   
        $total_contract=$this->Contract->total_contract??0;
        $paid_amt=$this->amt_paid;
         return $total_contract-(int)$paid_amt;
     }
     public function getOverdueAmtAttribute(){   
        $Odinvoice=$this->count();
        $sum=$this->sum('overdue_period');
         return $Odinvoice*(int)$sum;
     }
     public function TenantName()
     {
         return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
     }
    
}
