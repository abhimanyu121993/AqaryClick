<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function nationality()
    {
      return $this->belongsTo(Nationality::class,'country_name','id');
    }

    public function zones()
    {
      return $this->hasMany(Area::class,'city_id','id');
    }
}
