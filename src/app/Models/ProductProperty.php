<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductProperty extends Model
{
    use HasFactory;
    protected $table = 'product_property';
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function properties(): BelongsTo
    {
        return $this->belongsTo(Property::class,'product_id');
    }
    public function scopeWithWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
