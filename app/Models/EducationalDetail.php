<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalDetail extends Model
{
    protected $fillable = [
        'user_id',
        'qualification',
        'university',
        'institute_name',
        'institute_address',
        'obtaining_diploma_degree',
        'from_to_graduation_year',
        'grade',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
