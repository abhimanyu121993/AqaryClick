<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function tenantDetails()
    {
        return $this->belongsTo(Tenant::class, 'tenant_name', 'id');
    }
    public function ownerDetails()
    {
        return $this->belongsTo(Owner::class, 'lessor', 'id');
    }
    public function lessorDetails()
    {
        return $this->belongsTo(Owner::class, 'approved_by', 'id');
    }

    public function getTotalContractAttribute(){   
       $rent=$this->rent_amount;
       $month=$this->lease_period_month;
        return $rent*$month;
    }
}
