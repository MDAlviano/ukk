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
        'rating',
        'description',
        'stock',
        'category_id'
    ];

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function stockLogs(): HasMany {
        return $this->hasMany(StockLog::class, 'product_id', 'id');
    }

    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }
}
