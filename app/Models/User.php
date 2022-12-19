<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;
class User extends Authenticatable implements HasLoginsAndDevicesInterface
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, HasLoginsAndDevices;  
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
