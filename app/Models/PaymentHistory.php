<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentHistory extends Model
{
    use HasFactory,SoftDeletes;
    Protected $guarded=[];
    public function tenantPayment()
    {
        return $this->belongsTo(TenantPayment::class, 'tenant_payment_id', 'id');

    }
}
