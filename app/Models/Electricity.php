<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Electricity extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_name', 'id');
    }
  public function unit()
  {
        return $this->belongsTo(Unit::class, 'unit_no','unit_no');
  }
}
