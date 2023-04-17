<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasMany('App\Models\Profile');
    }

    public function wallet()
    {
        return $this->hasMany('App\Models\Wallet');
    }

    public function referralwallet()
    {
        return $this->hasMany('App\Models\ReferralWallet');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function submittedtask()
    {
        return $this->hasMany('App\Models\SubmittedTask');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function bank()
    {
        return $this->hasMany('App\Models\Bank');
    }

    public function topup()
    {
        return $this->hasMany('App\Models\Topup');
    }

    public function referral()
    {
        return $this->hasMany('App\Models\Referral');
    }
}
