<?php
require '../vendor/autoload.php';
require '../config/database.php';

use App\Models\Product;
use App\Models\Http\Controllers\PageController;

$controller = new PageController();

$numTables = $_GET['num-tablas'] ?? 5;

$filter = [
    'titulo' => $_GET['title'] ?? null,
    'trama' => $_GET['plot'] ?? null,
    'genero' => $_GET['genre'] ?? null,
    'actores' => $_GET['actors'] ?? null,
    'clasificacion' => $_GET['rated'] ?? null,
    'estreno' => $_GET['released'] ?? null,
    'escritor' => $_GET['writer'] ?? null,
];
$products = $controller->index($filter, $numTables);

include "../resources/views/lists.php";



