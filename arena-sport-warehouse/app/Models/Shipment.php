<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'address_id',
        'name',
        'price',
    ];

    public function addresses(): BelongsTo {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function orders(): HasMany {
        return $this->hasMany(Favorite::class, 'shipment_id', 'id');
    }
}
