<?php

namespace App\Http\Controllers;

use App\Models\ProductProperty;
use App\Models\Property;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request){
        return Property::with('products:id')->where('name',$request->filterBy)->distinct()->get();
    }
}
