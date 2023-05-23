<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ProductResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'product_name' => $this->name,
            'product_price' => $this->price,
            'product_description' => $this->description,
            'product_created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i:s'),
            
            
        ];
    }

}
