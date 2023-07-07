<?php

require '../vendor/autoload.php';                                           // Se utiliza el autoload para cargar automáticamente las librerías de Eloquent

require '../config/database.php';                                           // Se incluye la configuración de la base de datos para que el modelo de Eloquent pueda acceder a ella


use App\Models\Product;                                                     // Se importa el modelo Product para interactuar con la base de datos


use App\Models\Http\Controllers\PageController;                             // Se importa el controlador PageController que contiene funciones de paginación, contenido y ordenamiento


$controller = new PageController();                                         // Se crea una instancia del controlador para utilizar sus funciones más adelante


$numTables = $_GET['num-tablas'] ?? 5;                                      // Se obtiene el valor de 'num-tablas' del parámetro $_GET y se asigna a la variable $numTables, si no está presente, se utiliza el valor predeterminado de 5

$filter = [                                                                    // Se definen los filtros utilizando los valores de las cajas de filtro en lists.php obtenidos a través de $_GET
    'titulo' => $_GET['title'] ?? null,
    'trama' => $_GET['plot'] ?? null,
    'genero' => $_GET['genre'] ?? null,
    'actores' => $_GET['actors'] ?? null,
    'clasificacion' => $_GET['rated'] ?? null,
    'estreno' => $_GET['released'] ?? null,
    'escritor' => $_GET['writer'] ?? null,
];


$products = $controller->index($filter, $numTables);                            // Se llama a la función 'index' del controlador con los filtros y el número de tablas, y se almacena el resultado en la variable $products


include "../resources/views/lists.php";                                         // Se incluye la vista lists.php para mostrar los resultados