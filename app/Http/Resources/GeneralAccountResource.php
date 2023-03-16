<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'daily_expenses' => $this->daily_expenses,
            'product_expenses' => $this->product_expenses,
            'total_expenses' => $this->total_expenses,
            'total_earnings' => $this->total_earnings,
            'total_balance' => $this->total_balance,
        ];
    }
}
