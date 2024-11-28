<?php
class Vote {
    private $conn;
    private $table_name = "votes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Cast a vote
    public function castVote($voter_id, $nominee_id, $category, $comment) {
        if ($voter_id == $nominee_id) return false; // Self-voting not allowed
        $query = "INSERT INTO " . $this->table_name . " (voter_id, nominee_id, category, comment) 
                  VALUES (:voter_id, :nominee_id, :category, :comment)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voter_id', $voter_id);
        $stmt->bindParam(':nominee_id', $nominee_id);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':comment', $comment);
        return $stmt->execute();
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
}

?>
