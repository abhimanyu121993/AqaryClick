<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Broker extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function unitdetails()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function buildingdetails()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
}
