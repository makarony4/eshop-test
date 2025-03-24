<?php
require_once '../../vendor/autoload.php';

use App\Controller\ProductController;

$controller = new ProductController();
$product_id = $_GET['id'] ?? null;
if ($product_id) {
    $controller->getProduct($product_id);
}