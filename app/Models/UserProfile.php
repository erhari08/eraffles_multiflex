<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'father_name',
        'mother_name',
        'gender',
        'date_of_birth',
        'mobile',           
        'place_of_birth',
        'nationlity',
        'blood_group',
        'address',
        'pin_code',
        'aadhar'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
