<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'name',
        'slug',
        'image_url'
    ];

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
