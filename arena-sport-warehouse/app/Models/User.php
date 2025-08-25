<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
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

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function wishlists(): HasMany {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }

    public function favorites(): HasMany {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }

    public function stockLogs(): HasMany {
        return $this->hasMany(StockLog::class, 'user_id', 'id');
    }

}   
