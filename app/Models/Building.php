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
}
