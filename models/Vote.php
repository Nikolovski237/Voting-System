<?php
class Vote {
    private $conn;
    private $table_name = "votes";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function castVote($voter_id, $nominee_id, $category, $comment) {
        if ($voter_id == $nominee_id) return false; // Self-voting not allowed

        $query = "INSERT INTO " . $this->table_name . " (voter_id, nominee_id, category, comment) VALUES (:voter_id, :nominee_id, :category, :comment)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voter_id', $voter_id);
        $stmt->bindParam(':nominee_id', $nominee_id);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':comment', $comment);

        return $stmt->execute();
    }

    public function getResults() {
        $query = "SELECT category, nominee_id, COUNT(*) AS votes FROM " . $this->table_name . " GROUP BY category, nominee_id ORDER BY votes DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addVote($voter_id, $nominee_id, $category, $comment)
{
    $query = "INSERT INTO votes (voter_id, nominee_id, category, comment) VALUES (:voter_id, :nominee_id, :category, :comment)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':voter_id', $voter_id);
    $stmt->bindParam(':nominee_id', $nominee_id);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':comment', $comment);

    return $stmt->execute();
}

}
?>
