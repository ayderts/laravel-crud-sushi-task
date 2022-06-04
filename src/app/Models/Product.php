<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_product', 'product_id', 'property_id');
    }
    public function productProperties(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }
}
