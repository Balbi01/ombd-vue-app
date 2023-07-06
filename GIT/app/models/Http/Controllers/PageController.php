<?php

namespace App\Models\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;


class PageController
{
    public function index($filter = [], $numTables = 5)
    {
        $query = Product::query();

        if (!empty($filter['titulo'])) {
            $titulo = $filter['titulo'];
            $query->where('title', 'LIKE', "%$titulo%");
        }

        if (!empty($filter['trama'])) {
            $trama = $filter['trama'];
            $query->where('plot', 'LIKE', "%$trama%");
        }
    
        if (!empty($filter['genero'])) {
            $genero = $filter ['genero'];
            $query->where('genre', 'LIKE', "%$genero%");
        }
    
        if (!empty($filter['actores'])) {
            $actores = $filter ['actores'];
            $query->where('actors', 'LIKE', "%$actores%");
        }
    
        if (!empty($filter['clasificacion'])) {
            $clasificacion = $filter ['clasificacion'];
            $query->where('rated', 'LIKE', "%$clasificacion%");
        }
    
        if (!empty($filter['estreno'])) {
            $estreno = $filter ['estreno'];
            $query->where('released', 'LIKE', "%$estreno%");
        }
    
        if (!empty($filter['escritor'])) {
            $escritor = $filter['escritor'];
            $query->where('writer', 'LIKE', "%$escritor%");
        }

        $sort = $_GET['sort'] ?? 'id';
        $direction = $_GET['direction'] ?? 'asc';
        $query->orderBy($sort, $direction);

        // Paginación
        $products = $query->paginate($numTables);
        $products->appends($filter);
        $products->appends(['sort' => $sort, 'direction' => $direction]);

        $page = $_GET['page'] ?? 1;

        $products = $query->paginate($numTables, ['*'], 'page', $page);

        $products->appends($filter);
    
        return $products;
    }
}
