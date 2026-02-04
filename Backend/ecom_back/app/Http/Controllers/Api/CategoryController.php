<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Liste de toutes les catégories actives
     */
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->get();

        return ApiResponseHelper::success(CategoryResource::collection($categories), 'Liste des catégories');
    }

    /**
     * Récupérer une catégorie par UUID
     */
    public function show(string $id)
    {
        $category = Category::where('id', $id)
            ->where('is_active', true)
            ->withCount('products')
            ->firstOrFail();

        return ApiResponseHelper::success(new CategoryResource($category), 'Détails de la catégorie');
    }
}
