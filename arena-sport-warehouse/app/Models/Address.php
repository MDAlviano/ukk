<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $table = "addresses";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'recipient_name',
        'address',
        'city',
        'province',
        'country',
        'postal_code',
        'additional_information',
    ];

    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'shipment_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
