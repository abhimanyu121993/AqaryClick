<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grace extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function contract_details()
    {
        return $this->belongsTo(Contract::class, 'contract_code','contract_code');
    }
}
