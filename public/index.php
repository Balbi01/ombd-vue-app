<?php

require '../vendor/autoload.php';
require '../config/database.php';

$products = App\Models\Product::get();
include "../resources/views/lists.php";

/* require '../app/models/Http/Controllers/PageController.php'; */


