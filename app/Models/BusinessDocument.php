<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessDocument extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function businessDocument()
    {
        return $this->belongsTo(BusinessDetail::class, 'business_id', 'id');
    }   
}
