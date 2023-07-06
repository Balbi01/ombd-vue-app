<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'basic',
    'username' => 'root1',
    'password' => ' ',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);  //Se configura el php para conectarse a la base de datos directamente, capsule es necesario para acceder a la db


$capsule->setAsGlobal(); //Se define la capsula como global

$capsule->bootEloquent(); //La capsula inicia eloquent

