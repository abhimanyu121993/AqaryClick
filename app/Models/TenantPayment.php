<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenantPayment extends Model
{
    use HasFactory,SoftDeletes;
    Protected $guarded=[];
    public function payHistory()
    {
        return $this->hasMany(PaymentHistory::class, 'tenant_payment_id', 'id');

    }
}
