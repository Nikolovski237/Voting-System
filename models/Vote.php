<?php
class Vote {
    private $conn;
    private $table_name = "votes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Cast a vote
    public function castVote($voter_id, $nominee_id, $category_id, $comment) {
        if ($voter_id == $nominee_id) return false; // Self-voting not allowed
    
        // Check if the category_id is a string (name), and retrieve the actual ID
        if (is_string($category_id)) {
            $category_id = $this->getCategoryIdByName($category_id);
            if (!$category_id) {
                return false; // Invalid category
            }
        }
    
        $query = "INSERT INTO " . $this->table_name . " (voter_id, nominee_id, category_id, comment) 
                  VALUES (:voter_id, :nominee_id, :category_id, :comment)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voter_id', $voter_id);
        $stmt->bindParam(':nominee_id', $nominee_id);
        $stmt->bindParam(':category_id', $category_id); // Using category_id
        $stmt->bindParam(':comment', $comment);
        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    

    // Get results for each category
    public function getResults() {
        $query = "
            SELECT 
                c.name AS category,
                u.name AS nominee_name,
                COUNT(v.id) AS votes,
                GROUP_CONCAT(v.comment SEPARATOR '; ') AS comment
            FROM votes v
            INNER JOIN categories c ON v.category_id = c.id
            INNER JOIN users u ON v.nominee_id = u.id
            GROUP BY c.id, u.id
            ORDER BY c.name, votes DESC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get the voter who cast the most votes
    public function getActiveVoters() {
        $query = "
            SELECT 
                u.name AS voter_name,
                COUNT(v.id) AS vote_count
            FROM votes v
            INNER JOIN users u ON v.voter_id = u.id
            GROUP BY v.voter_id
            ORDER BY vote_count DESC
            LIMIT 1
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCategoryIdByName($category_name) {
        $query = "SELECT id FROM categories WHERE name = :name LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $category_name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            return $row['id']; // Return the category ID
        } else {
            return null; // Return null if the category does not exist
        }
    }
}

?>
