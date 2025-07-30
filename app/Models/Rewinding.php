<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rewinding extends Model
{
    //
     protected $fillable = [ 
        'rewind_date',
        'shift_id',
        'user_id',
        'operator_id',
        'jobcard_id',
        'machine_id',
        'status'
     ];
     public function user()
{
    return $this->belongsTo(User::class);
}

public function operator()
{
    return $this->belongsTo(User::class, 'operator_id');
}

public function jobcard()
{
    return $this->belongsTo(Jobcard::class);
}

public function machine()
{
    return $this->belongsTo(Machine::class);
}
}
