<?php

include_once "cors.php";
require '../../vendor/autoload.php';
require '../../config/database.php';

use App\Models\Product;

$data = json_decode($_POST['nArray']);
/* var_dump($data); */

if(isset($_POST['nArray'])){
    $data = json_decode($_POST['nArray'], true);
    $datos = [
        [
        'title'=> $data[0],
        'plot' => $data[2],
        'genre' => $data[1],
        'actors' => $data[3],
        'rated'=> $data[4],
        'released'=> $data[5],
        'writer' => $data[6]
        ]
    ];
    foreach ($datos as $dato){
        Product::create($dato);
    }
}

?>