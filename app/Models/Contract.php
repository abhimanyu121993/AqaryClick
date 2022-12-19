<?php

namespace App\Models;

use Faker\Provider\ar_EG\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
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

    public function getTotalContractAttribute()
    {
        $rent = $this->rent_amount ?? 0;
        $month = $this->lease_period_month ?? 0;
        return (float)$rent * (float)$month;
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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'lessor');
    }

    public function company()
    {
        return $this->belongsTo(BusinessDetail::class, 'company_id');
    }

    public function getLastPaidInvoiceAttribute()
    {
        $inv = Invoice::where('contract_id', $this->id)->where('payment_status', 'Paid')->latest()->first();
        if ($inv) {
            return $inv->invoice_period_end;
        } else {
            return false;
        }
    }
    public function getTotalInvoiceOverdueAttribute()
    {
        $res = Contract::where('contract_id', $this->id)->where('overdue', '>=', 90)->latest()->first();
        if ($res) {
            return ($res->overdue) / 30;
        } else {
            return false;
        }
    }
    public function legal()
    {
        return $this->hasOne(Legal::class, 'contract_id');
    }
}
