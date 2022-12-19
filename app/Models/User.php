<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    protected $guarded = [];

    public function companyOwner()
    {
        return $this->hasMany(OwnerCompany::class,'user_id','id');
    }
    public function bank_details()
    {
        return $this->hasMany(BankDetail::class,'user_id','id');
    }

    public function getNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function customerDetail()
    {
        return $this->hasOne(Customer::class, 'email', 'email');
    }

}
