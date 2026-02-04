<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ProductResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status_code' => 200,
            'success' => true,
            'message' => $this->additional['message'] ?? 'Liste des produits',
            'data' => $this->collection,
        ];
    }

    /**
     * Add pagination information to the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array $paginated
     * @param  array $default
     * @return array
     */
    public function paginationInformation($request, $paginated, $default)
    {
        return [
            'pagination' => [
                'current_page' => $default['meta']['current_page'],
                'per_page' => $default['meta']['per_page'],
                'total' => $default['meta']['total'],
                'last_page' => $default['meta']['last_page'],
                'from' => $default['meta']['from'],
                'to' => $default['meta']['to'],
            ],
        ];
    }
}
