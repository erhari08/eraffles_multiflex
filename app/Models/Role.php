<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // If many-to-many
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // If single-role per user (with role_id in users table)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
