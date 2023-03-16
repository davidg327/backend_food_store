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
            'buy_product' => $this->buy_product,
            'product_input' => $this->product_input,
            'sale_product' => $this->sale_product,
            'final_product_inventory' => $this->final_product_inventory,
            'spent' => $this->spent,
            'sale' => $this->sale,
            'product_profit' => $this->product_profit,
            'product' => [
                'purchase_value' => $this->product->purchase_value,
                'sale_value' => $this->product->sale_value,
            ]
        ];
    }
}
