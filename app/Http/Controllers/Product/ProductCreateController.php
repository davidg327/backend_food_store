<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;

class ProductCreateController extends Controller
{
    public function create(Request $request)
    {
        $product = New Product();
        $product->name = $request->name;
        $product->purchase_value = $request->purchase_value;
        $product->sale_value = $request->sale_value;
        $product->state_id = State::where('name', State::EXISTING)->value('id');
        $product->save();
        $productResource = ProductResource::make($product);
        $data = [
            'message' => 'Producto creado correctamente',
            'product' => $productResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
