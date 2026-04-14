<?php

class Category
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

     public function all(): array
    {
        $sql = "SELECT c.*, COUNT(cp.post_id) AS posts_count FROM categories c 
                LEFT JOIN post_category cp ON c.id = cp.category_id 
                GROUP BY c.id";
                
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }
    
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }

    
}