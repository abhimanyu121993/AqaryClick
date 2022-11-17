<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cheque extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function TenantName()
     {
         return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
     }
}
