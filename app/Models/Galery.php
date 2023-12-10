<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'galarie_title',
        'galarie_description',
        'galarie_tag',
        'galarie_photo',
        'user_id'
    ];

    /*
     * Get the user that owns the Galery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
