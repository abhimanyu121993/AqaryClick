<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChequeStatement extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_no', 'id');
    }
}
