<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionalQualification extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'experience_years',
        'certification',
        'description'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
