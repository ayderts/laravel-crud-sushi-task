<?php

namespace App\Services;

use App\Models\Property;

class PropertyService
{
    public function show(object $request): ?object
    {
        $property_id = Property::query()->where('name',$request->filterBy)->first();
        return Property::with('productProperties')->withWhereHas('productProperties', fn($query) =>
            $query->where('property_id',$property_id->id)->groupBy('property_value')
            )->find($property_id->id);
    }

}
