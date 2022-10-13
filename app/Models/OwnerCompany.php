<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OwnerCompany extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function owenrs()
    {
        return $this->hasMany(CompanyDocument::class,'company_id','id');
    }
    public function bank_details()
    {
        return $this->hasMany(BankDetail::class,'company_id','id');
    }
}
