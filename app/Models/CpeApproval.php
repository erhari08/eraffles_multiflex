<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CpeApproval extends Model
{
    protected $fillable = [
        'cpe_programs_id',
        'send_by',
        'attendance',
        'cc_certificate',
        'status',
    ];
 

   

}
