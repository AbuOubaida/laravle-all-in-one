<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use BackedEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'user_name',
        'name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'address_3',
        'password',
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getPermissions(): MorphToMany
    {
        // TODO: Implement permissions() method.
        return $this->hasMany(UserPermission::class);
    }

    public function defaultPermissions()
    {
        return $this->hasMany(RoleWiseDefaultPermission::class);
    }

    public function hasUserPermission($permission)
    {
        // TODO: Implement hasPermission() method.
        return $this->isSuperAdmin() || $this->defaultPermissions()->where('role_name',$this->getUserType())->where('permission_name',$permission)->exists() || $this->getPermissions()->where('permission_name', $permission)->exists();
    }
    public function isSuperAdmin()
    {
        // Check if the user is a superadmin (you define the logic for this)
        return $this->getUserType() === 'super-admin'; // Adjust this based on your implementation
    }
    public function getUserType()
    {
        $roles = $this->roles;

        // Assuming a user has only one role, you can return its name
        if ($roles->count() > 0) {
            return $roles->first()->name;
        }

        return 'user'; // Default user type if no role is associated
    }
}
