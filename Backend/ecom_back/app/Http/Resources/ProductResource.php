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
            'slug' => $this->slug,
            'price' => $this->price,
            'stock_quantity' => $this->stock_quantity,
            'alert_threshold' => $this->alert_threshold,
            'short_description' => $this->short_description,
            'is_active' => $this->is_active,
            'in_stock' => $this->isInStock(),
            'is_low_stock' => $this->isLowStock(),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'images' => ProductImageResource::collection($this->whenLoaded('images')),
            'main_image' => new ProductImageResource($this->whenLoaded('mainImage')),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
