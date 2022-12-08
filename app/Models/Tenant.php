<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = [];

    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_name');
    }
    public function tenantNationality()
    {
        return $this->belongsTo(Nationality::class, 'tenant_nationality', 'id');
    }
    

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'sponsor_nationality', 'id');
    }
    public function unittypeinfo()
    {
        return $this->belongsTo(UnitType::class, 'unit_type', 'id');

    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_no');
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
