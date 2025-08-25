<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    protected $table = "wishlists";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
