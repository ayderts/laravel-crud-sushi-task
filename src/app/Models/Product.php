<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_product', 'product_id', 'property_id');
    }
}
