<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductIndexController extends Controller
{
    public function index()
    {

        return ProductResource::collection(Product::all());
    }
}
