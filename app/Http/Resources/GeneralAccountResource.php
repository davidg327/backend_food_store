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
            'day' => $this->day,
            'daily_expenses' => intval($this->daily_expenses),
            'product_expenses' => intval($this->product_expenses),
            'total_expenses' => intval($this->total_expenses),
            'total_broken' => intval($this->total_broken),
            'total_sales' => intval($this->total_sales),
            'total_earnings' => intval($this->total_earnings),
            'total_balance' => intval($this->total_balance),
        ];
    }
}
