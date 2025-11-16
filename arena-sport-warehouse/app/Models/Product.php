<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'name',
        'price',
        'image_url',
        'slug',
        'description',
        'stock',
        'category_id'
    ];

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function favorites(): HasMany {
        return $this->hasMany(Favorite::class, 'product_id', 'id');
    }

    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }

}
