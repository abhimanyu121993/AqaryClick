<?php

namespace App\Models;

use Faker\Provider\ar_EG\Company;
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
    public function countryDetails()
    {
        return $this->belongsTo(Nationality::class, 'tenant_nationality', 'id');
    }
    
    public function ownerDetails()
    {
        return $this->belongsTo(User::class, 'lessor', 'id');
    }
    public function businessDetails()
    {
        return $this->belongsTo(BusinessDetail::class, 'lessor', 'user_id');
    }
    public function lessorDetails()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function getTotalContractAttribute(){   
       $rent=$this->rent_amount;
       $month=$this->lease_period_month;
        return $rent*$month;
    }
    public function cheques()
    {
        return $this->hasMany(Cheque::class, 'contract_id');
    }
    public function latest_invoices()
    {
        return $this->hasOne(Invoice::class, 'contract_id')->latest();
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'contract_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'lessor');
    }

    public function company()
    {
        return $this->belongsTo(BusinessDetail::class, 'company_id');
    }
}
