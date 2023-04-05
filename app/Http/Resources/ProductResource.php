<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'purchase_value' => $this->purchase_value,
            'sale_value' => $this->sale_value,
            'quantity' => $this->quantity,
            'image' => $this->image,
            'state' => [
                'id' => $this->state->id,
                'name' => $this->state->name,
            ]
        ];
    }
}
