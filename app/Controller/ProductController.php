<?php

namespace App\Controller;

use App\DB\Database;
use App\Model\Category;
use App\Model\Product;

class ProductController
{
    private Product $product;
    private Category $category;

    public function __construct() {
        $database = new Database();
        $this->product = new Product($database);
        $this->category = new Category($database);
    }

    public function index(): void
    {
        $categories = $this->category->read();
        isset($_GET['order_by']) ? $order_by = $_GET['order_by'] : $order_by = 'price';
        $products = $this->product->read($_GET['category_id'] ?? null, $order_by );
        include __DIR__ . '/../../views/index.php';
    }

    public function getProducts($category_id = null, $order_by = 'price'): void
    {
        $products = $this->product->read($category_id, $order_by);
        include __DIR__ . '/../../views/products.php';
    }

    public function getProduct($product_id): void
    {
        $products = $this->product->getProduct($product_id)->fetch(\PDO::FETCH_ASSOC);
        echo json_encode($products);
    }
}