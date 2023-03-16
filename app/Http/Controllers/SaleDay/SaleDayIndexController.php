<?php

namespace App\Http\Controllers\SaleDay;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDayResource;
use App\Models\SaleDay;
use Illuminate\Http\Request;

class SaleDayIndexController extends Controller
{
    public function index()
    {
        return SaleDayResource::collection(SaleDay::all());
    }
}
