<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitStatus extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function unitStatusDetails()
    {
        return $this->hasMany(Unit::class, 'unit_status', 'id');
    }
}
