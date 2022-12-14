<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Legal extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function tenantName()
    {
        return $this->belongsTo(Tenant::class, 'tenant_name', 'id');
    }
    public function contractDetails()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
    public function unitType()
    {
        return $this->belongsTo(Unit::class, 'unit_type', 'id');
    }
    public function unitRef()
    {
        return $this->belongsTo(Unit::class, 'unit_ref', 'unit_ref');
    }
}
