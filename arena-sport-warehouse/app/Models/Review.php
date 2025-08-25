<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $table = "reviews";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment'
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
