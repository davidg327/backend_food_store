<?php

namespace App\Http\Controllers\SaleDay;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDayResource;
use App\Models\Product;
use App\Models\SaleDay;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleDayIndexController extends Controller
{
    public function index()
    {
        return SaleDayResource::collection(SaleDay::all());
    }

    public function getProductYesterday(Product $product, Request $request)
    {
        $saleDay = SaleDay::where('day', $request->date)->first();
        dd($saleDay);
        /*$saleDayResource = SaleDayResource::make($saleDay);
        $name = 'Diario de producto '. $product->name. ' creado correctamente';
        $data = [
            'message' => $name,
            'product' => $saleDayResource,
            'code' => 200,
        ];
        return response()->json($data);*/
    }
}
