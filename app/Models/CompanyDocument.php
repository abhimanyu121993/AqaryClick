<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDocument extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = [];

    public function ownerdetail()
    {
        return $this->belongsTo(OwnerCompany::class,'company_id','id');
    }
}
