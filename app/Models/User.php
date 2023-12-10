<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Account;
use App\Models\Galery;
use App\Models\Reminder;
use App\Models\VoiceNotes;




class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'user_name',
        'user_telephone',
        'user_email',
        'user_birth_date',
        'user_photo',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    // TODO: relation one to one User with Account
    public function accounts(): HasOne
    {
        return $this->hasOne(Account::class,'user_id','id');
    }


    //TODO: 1:M User with Models

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voiceNotes(): HasMany
    {
        return $this->hasMany(VoiceNotes::class);
    }

    public function galeries(): HasMany
    {
        return $this->hasMany(Galery::class);
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }

}
