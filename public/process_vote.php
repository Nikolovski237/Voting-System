<?php
ini_set('display_errors', 0); // Don't display errors in the browser
ini_set('log_errors', 1);    // Log errors to a file
ini_set('error_log', 'php_errors.log'); // Path to error log file

header('Content-Type: application/json'); // Ensure response is JSON

require '../config/database.php'; // Database connection
require '../models/Vote.php'; // Vote class

$voteModel = new Vote($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_id = $_POST['voter_id'];
    $nominee_id = $_POST['nominee_id'];
    $category = $_POST['category'];
    $comment = $_POST['comment'];

    // Prevent self-voting
    if ($voter_id == $nominee_id) {
        echo json_encode(['success' => false, 'message' => 'You cannot vote for yourself.']);
        exit;
    }

    // Attempt to cast the vote
    if ($voteModel->castVote($voter_id, $nominee_id, $category, $comment)) {
        echo json_encode(['success' => true, 'message' => 'Vote cast successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error casting vote.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
