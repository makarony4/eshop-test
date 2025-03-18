<?php

namespace App\Model;

use App\DB\Database;
class Category
{
    private $conn;
    private $table = 'categories';

    public function __construct(Database $db) {
        $this->conn = $db->getConnection();
    }

    public function read() {
        $query = 'SELECT c.id, c.name, COUNT(p.id) as product_count FROM ' . $this->table . ' c LEFT JOIN products p ON c.id = p.category_id GROUP BY c.id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}