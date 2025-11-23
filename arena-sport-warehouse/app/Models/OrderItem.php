<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = "order_items";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal'
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function orders(): BelongsTo {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
