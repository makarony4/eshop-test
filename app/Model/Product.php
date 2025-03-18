<?php

namespace App\Model;

use App\DB\Database;
class Product
{
    private $conn;
    private $table = 'products';

    public function __construct(Database $db) {
        $this->conn = $db->getConnection();
    }

    public function read($category_id = null, $order_by = 'price') {
        $query = 'SELECT * FROM ' . $this->table;
        if ($category_id) {
            $query .= ' WHERE category_id = :category_id';
        }
        $query .= ' ORDER BY ' . $order_by;
        $stmt = $this->conn->prepare($query);
        if ($category_id) {
            $stmt->bindParam(':category_id', $category_id);
        }
        $stmt->execute();
        return $stmt;
    }
}