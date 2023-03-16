<?php

namespace App\Http\Controllers\SaleDay;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDayResource;
use App\Models\Product;
use App\Models\SaleDay;
use Illuminate\Http\Request;

class SaleDayShowController extends Controller
{
    public function show($id)
    {
        return SaleDayResource::make(SaleDay::find($id));
    }
}
