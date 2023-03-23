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

    public function getProductYesterday(Request $request)
    {

        $saleDay = SaleDay::where('day', $request->date)->where('product_id', $request->product_id)->first();
        $saleDayResource = SaleDayResource::make($saleDay);
        $data = [
            'data' => $saleDayResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
