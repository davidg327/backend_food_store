<?php

namespace App\Http\Controllers\GeneralAccount;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralAccountResource;
use App\Models\GeneralAccount;
use Illuminate\Http\Request;

class GeneralAccountUpdateController extends Controller
{
    public function update(Request $request, GeneralAccount $generalAccount)
    {

        $productExpenses = $generalAccount->saleDays()->pluck('spent')->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        $productSale = $generalAccount->saleDays()->pluck('sale')->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        $productBroken = $generalAccount->saleDays()->pluck('broken')->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        $productEarning = $generalAccount->saleDays()->pluck('product_profit')->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        $generalAccount->daily_expenses = $request->daily_expenses;
        $generalAccount->product_expenses = $productExpenses;
        $generalAccount->total_expenses = $generalAccount->daily_expenses + $generalAccount->product_expenses;
        $generalAccount->total_broken = $productBroken;
        $generalAccount->total_sales = $productSale;
        $generalAccount->total_earnings = $productEarning;
        $generalAccount->total_balance = $generalAccount->total_sales - $generalAccount->total_expenses;
        $generalAccount->save();
        $generalAccountResource = GeneralAccountResource::make($generalAccount);
        $data = [
            'message' => 'Cuenta general actualizada correctamente',
            'product' => $generalAccountResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
