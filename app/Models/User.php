<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_approved' => 'boolean',
        ];
    }

    /**
     * Get the valid roles.
     *
     * @return array<string, string>
     */
    public static function getRoles(): array
    {
        return [
            self::ROLE_SUPERADMIN => 'Super Admin',
            self::ROLE_ADMIN => 'Admin',
        ];
    }

    /**
     * Check if user is a superadmin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    /**
     * Check if user is an admin or superadmin.
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN || $this->isSuperAdmin();
    }

    /**
     * Check if user is a regular user (not admin or superadmin)
     */
    public function isRegularUser(): bool
    {
        return !$this->isAdmin() && !$this->isSuperAdmin();
    }
}
