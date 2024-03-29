<?php

namespace App\Http\Controllers\SaleDay;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDayResource;
use App\Models\Product;
use App\Models\SaleDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleDayCreateController extends Controller
{
    public function updateQuantityProduct($productId, $quantity)
    {
        $product = Product::find($productId);
        $product->quantity = $quantity;
        $product->save();
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($request->product_id);
            $saleDay = New SaleDay();
            $saleDay->day = Carbon::now('America/Bogota')->toDateString();
            $saleDay->buy_product = $request->buy_product; //Cantidad de compra
            if($request->final_product_after_day === 0){
                $saleDay->product_input = $saleDay->buy_product;
            }else{
                $saleDay->product_input = $saleDay->buy_product + $request->final_product_after_day;
            }
            $saleDay->sale_product = $request->sale_product; //Cantidad de vendidos
            $saleDay->broken_product = $request->broken_product; // Cantidad de averiados
            $saleDay->final_product_inventory = $saleDay->product_input - $saleDay->sale_product -  $saleDay->broken_product;
            $saleDay->spent = $product->purchase_value * $request->buy_product;
            $saleDay->sale = $product->sale_value * $request->sale_product;
            $saleDay->broken =  $product->purchase_value * $request->broken_product;
            $saleDay->product_profit = $saleDay->sale - $saleDay->spent;
            $saleDay->product_id = $request->product_id;
            $saleDay->general_account_id = $request->general_account_id;
            $saleDay->save();
            $this->updateQuantityProduct($request->product_id, $saleDay->final_product_inventory);
            $saleDayResource = SaleDayResource::make($saleDay);
            DB::commit();
            $name = 'Diario de producto '. $product->name. ' creado correctamente';
            $data = [
                'message' => $name,
                'product' => $saleDayResource,
                'code' => 200,
            ];
            return response()->json($data);
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException  $exception) {
            DB::rollBack();
            $data = [
                'message' => 'error',
                'code' => 400,
            ];

            return response()->json($data);
        }
    }
}
