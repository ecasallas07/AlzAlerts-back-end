<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Account extends Model
{
    use HasFactory;

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
