<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Retrieve all permissions (roles + direct permissions)
    public function allPermissions()
    {
        $rolePermissions = $this->roles()->with('permissions')->get()->pluck('permissions')->flatten();
        $directPermissions = $this->permissions()->get();
        return $rolePermissions->merge($directPermissions)->unique('id');
    }


}
