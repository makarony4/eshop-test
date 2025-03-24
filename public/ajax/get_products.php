<?php
require_once '../../vendor/autoload.php';

use App\Controller\ProductController;

$controller = new ProductController();
$category_id = $_GET['category_id'] ?? null;
$order_by = $_GET['order_by'] ?? 'price';
$controller->getProducts($category_id, $order_by);