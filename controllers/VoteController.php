<?php
require_once "../config/database.php";
require_once "../models/Vote.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database())->getConnection();
    $voteModel = new Vote($db);

    // Get POST data
    $voter_id = $_POST['voter_id'];
    $nominee_id = $_POST['nominee_id'];
    $category = $_POST['category'];
    $comment = $_POST['comment'];

    // Prevent voting for yourself
    if ($voter_id === $nominee_id) {
        echo json_encode(['success' => false, 'message' => 'You cannot vote for yourself.']);
        exit;
    }

    // Validate input
    if (empty($voter_id) || empty($nominee_id) || empty($category) || empty($comment)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    // Add vote
    if ($voteModel->addVote($voter_id, $nominee_id, $category, $comment)) {
        echo json_encode(['success' => true, 'message' => 'Vote successfully submitted!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to submit the vote.']);
    }
}
?>
