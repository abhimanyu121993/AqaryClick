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
        return $this->belongsTo(unitStatus::class, 'unit_status', 'id');
    }
    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
}
