<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Handlers\ProductHandler;

$productHandler = new ProductHandler();
print_r($productHandler->getAllProducts());
