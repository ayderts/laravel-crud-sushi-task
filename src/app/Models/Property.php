<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_property', 'property_id', 'product_id')->distinct()->withPivot('property_value');
    }
    public function productProperties(): HasMany
    {
        return $this->hasMany(ProductProperty::class,'property_id','id');
    }
    public function scopeWithWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
