<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'full_name',
        'email',
        'password_hash',
        'role'
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function addresses(): HasMany {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function favorites(): HasMany {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }
}
