<?php

namespace App\Helpers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiResponseHelper
{
    /**
     * Retourne une réponse API formatée
     *
     * @param int $status Code de statut HTTP
     * @param mixed $data Données à retourner
     * @param string $message Message descriptif
     * @param bool $success Indique si la requête a réussi
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $message = '', $status = 200)
    {
        return response()->json([
            'status_code' => $status,
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Retourne une réponse d'erreur API
     *
     * @param string $message Message d'erreur
     * @param int $status Code de statut HTTP
     * @param mixed $data Données supplémentaires (optionnel)
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message = '', $status = 400, $data = null)
    {
        $mode = config('app.env');

        // En production, masquer les détails des erreurs 500
        if ($mode === 'production' && $status === 500) {
            $message = 'Une erreur interne est survenue. Veuillez réessayer plus tard.';
            $data = null;
        }

        return response()->json([
            'status_code' => $status,
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Retourne une réponse paginée
     *
     * @param mixed $data Résultat paginé ou ResourceCollection
     * @param string $message Message descriptif
     * @return \Illuminate\Http\JsonResponse
     */
    public static function paginated($data, $message = '')
    {
        // Si c'est une ResourceCollection, extraire le paginator
        if ($data instanceof ResourceCollection) {
            $paginator = $data->resource;
            $items = $data->collection->all();
        } else {
            // Sinon c'est un paginator classique
            $paginator = $data;
            $items = $paginator->items();
        }

        return response()->json([
            'status_code' => 200,
            'success' => true,
            'message' => $message,
            'data' => $items,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'last_page' => $paginator->lastPage(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
            ],
        ], 200);
    }
}
