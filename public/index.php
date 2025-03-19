<?php
require_once '../vendor/autoload.php';
use App\Controller\ProductController;


$controller = new ProductController();
$controller->index();
