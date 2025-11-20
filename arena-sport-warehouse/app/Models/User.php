<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'full_name',
        'email',
        'password_hash',
        'role',
        'phone',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    // WAJIB: karena kolom password kamu bernama password_hash
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    // Opsional: biar email jadi username (default sudah email)
    public function username()
    {
        return 'email';
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }
}
