<?php

namespace App\Http\Controllers\SaleDay;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDayResource;
use App\Models\Product;
use App\Models\SaleDay;
use Illuminate\Http\Request;

class SaleDayUpdateController extends Controller
{
    public function update(Request $request, SaleDay $saleDay)
    {
        $product = Product::find($request->product_id);
        $saleDay->sale_product = $request->sale_product;
        $saleDay->final_product_inventory = $saleDay->product_input - $saleDay->sale_product;
        $saleDay->sale = $product->sale_value * $request->sale_product;
        $saleDay->product_profit = $saleDay->sale - $saleDay->spent;
        $saleDay->product_id = $request->product_id;
        $saleDay->save();
        $saleDayResource = SaleDayResource::make($saleDay);
        $name = 'Diario de producto '. $product->name. ' actualizado correctamente';
        $data = [
            'message' => $name,
            'product' => $saleDayResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
