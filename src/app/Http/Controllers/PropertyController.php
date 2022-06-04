<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;

use App\Http\Resources\PropertyResource;


use App\Models\Property;
use App\Services\PropertyService;


class PropertyController extends Controller
{
    protected PropertyService $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function show(PropertyRequest $request): ?object
    {
        if(Property::where('name',$request->filterBy)->where('filterable',true)->exists()) {
            return PropertyResource::make($this->propertyService->show($request));
        }
        return response()->json
        ([
            'success' => false,
            'message' => 'Данный фильтр недоступен для фильтрации'
        ]);
    }
}
