<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\UserProfile; // ensure this is correct path

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'ppc_id',
        'account_validity_date',
        'account_expired_date',
        'account_status',
        'regtype'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

        protected static function booted()
    {
        static::creating(function ($user) {
            if (is_null($user->role_id)) {
                $user->role_id = 2; // Default role ID
            }
        });
    }


    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function educationalDetails(): HasOne
    {
        return $this->hasOne(EducationalDetail::class);
    }

    public function professionalQualifications(): HasMany
    {
        return $this->hasMany(ProfessionalQualification::class);
    }

    public function attachments(): HasOne
    {
        return $this->hasOne(UserAttachment::class);
    }

    public function registratonStatus(): HasOne
    {
        return $this->hasOne(FreshApplicationServiceStatus::class);
    }

     public function renewalStatus(): HasOne
    {
        return $this->hasOne(Renewal::class);
    }

     public function restorationStatus(): HasOne
    {
        return $this->hasOne(Restoration::class);
    }





}
