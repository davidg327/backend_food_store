<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductUpdateController extends Controller
{
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->purchase_value = $request->purchase_value;
        $product->sale_value = $request->sale_value;
        $product->save();
        $productResource = ProductResource::make($product);
        $data = [
            'message' => 'Producto actualizado correctamente',
            'product' => $productResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
