<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Ben\Quiboitquoi\groupAllProduct;

$groupAllProduct = new groupAllProduct();
$DatePossibleJson = $groupAllProduct->LivraisonPossible();

dump($DatePossibleJson);

