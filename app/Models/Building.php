<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'country', 'id');
    }
    public function cityDetails()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }
    public function Units()
    {
        return $this->hasMany(Unit::class, 'building_id');
    }
    public function UnitsUnique()
    {
        return $this->hasMany(Unit::class, 'building_id')->distinct('unit_type');
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    public function files()
    {
        return $this->hasMany(BuildingFiles::class, 'building_id');
    }
}
