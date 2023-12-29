<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Account extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    protected $fillable =[
        'account_name',
        'account_email',
        'user_id'
    ];

    protected $casts = [
        'account_password' => 'hashed',
    ];

    protected $hidden = ['account_password'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
