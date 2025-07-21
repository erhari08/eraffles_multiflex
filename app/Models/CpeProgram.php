<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CpeProgram extends Model
{
    protected $fillable = ['date', 'name', 'venue', 'status', 'certificate_template','course_content'];

    
    
}
