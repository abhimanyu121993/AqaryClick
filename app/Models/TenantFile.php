<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenantFile extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function tenantDetails()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');

    }
    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_name');

    }
}
