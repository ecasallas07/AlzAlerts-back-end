<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reminder_title',
        'reminder_subject',
        'reminder_date',
        'reminder_time',
        'user_id'
    ];
    
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
