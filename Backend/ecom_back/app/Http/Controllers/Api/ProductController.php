<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Liste des produits paginée de manière aléatoire
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);

        $products = Product::with(['category', 'images', 'mainImage'])
            ->where('is_active', true)
            ->inRandomOrder()
            ->paginate($perPage);

        return (new ProductCollection($products))->additional(['message' => 'Liste des produits']);
    }

    /**
     * Liste des produits par catégorie
     */
    public function byCategory(Request $request, string $categoryId)
    {
        $perPage = $request->input('per_page', 15);

        $products = Product::with(['category', 'images', 'mainImage'])
            ->where('category_id', $categoryId)
            ->where('is_active', true)
            ->inRandomOrder()
            ->paginate($perPage);

        return (new ProductCollection($products))->additional(['message' => 'Produits de la catégorie']);
    }

    /**
     * Récupérer un produit par UUID
     */
    public function show(string $id)
    {
        $product = Product::with(['category', 'images'])
            ->where('id', $id)
            ->where('is_active', true)
            ->firstOrFail();

        return ApiResponseHelper::success(new ProductResource($product), 'Détails du produit');
    }

    /**
     * Rechercher des produits par nom ou description
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $perPage = $request->input('per_page', 15);

        if (empty($query)) {
            return ApiResponseHelper::error('Le paramètre de recherche "q" est requis', 400);
        }

        $products = Product::with(['category', 'images', 'mainImage'])
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'ILIKE', "%{$query}%")
                    ->orWhere('short_description', 'ILIKE', "%{$query}%");
            })
            ->paginate($perPage);

        return (new ProductCollection($products))->additional(['message' => 'Résultats de recherche']);
    }
}
