<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = [];

    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_name', 'id');
    }
}
