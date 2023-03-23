<?php

namespace App\Http\Controllers\GeneralAccount;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralAccountResource;
use App\Models\GeneralAccount;
use Carbon\Carbon;

class GeneralAccountIndexController extends Controller
{
    public function getFindLast()
    {
        $date = Carbon::now('America/Bogota')->toDateString();
        $generalAccount = GeneralAccount::where('day', $date)->first();
        $generalAccountResource = GeneralAccountResource::make($generalAccount);
        $data = [
            'data' => $generalAccountResource,
            'code' => 200,
        ];
        return response()->json($data);
    }
}
