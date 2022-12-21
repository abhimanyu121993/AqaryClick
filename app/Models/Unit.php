<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function unitStatus()
    {
        return $this->belongsTo(UnitStatus::class, 'unit_status', 'id');
    }
    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
    public function unitFeature()
    {
        return $this->belongsTo(UnitFeature::class, 'unit_feature', 'id');
    }

    public function unitTypeDetails()
    {
        return $this->belongsTo(UnitType::class, 'unit_type','id');
    }
    public function unittypeinfo()
    {
        return $this->belongsTo(UnitType::class, 'unit_type', 'id');

    }
    public function unitfloor(){
        return $this->belongsTo(UnitFloor::class, 'unit_floor');
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getUnitTypeNameAttribute()
    {
        return $this->unittypeinfo?$this->unittypeinfo->name:'';
    }
    public function getUnitStatusNameAttribute()
    {
        return $this->unitStatus?$this->unitStatus->name:'';
    }

}
