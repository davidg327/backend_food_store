<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleDayResource extends JsonResource
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
            'buy_product' => intval($this->buy_product),
            'product_input' => intval($this->product_input),
            'sale_product' => intval($this->sale_product),
            'final_product_inventory' => intval($this->final_product_inventory),
            'purchase_value' => intval($this->product->purchase_value),
            'sale_value' => intval($this->product->sale_value),
            'spent' => intval($this->spent),
            'sale' => intval($this->sale),
            'product_profit' => intval($this->product_profit),
        ];
    }
}
