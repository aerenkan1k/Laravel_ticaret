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
            'product_name' => $this->product_name,
            'photo' => $this->photo,
            'price' => $this->price,
            'product_description' => $this->product_description,
            'created_at' =>$this->created_at->format('d/m/y H:i:s'),
        ];
    }
}
