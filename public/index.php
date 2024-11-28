<?php
require_once "../config/database.php";
require_once "../models/User.php";
require_once "../models/Vote.php";

// Initialize database connection
$db = (new Database())->getConnection();
$userModel = new User($db);
$voteModel = new Vote($db);

// Simple routing logic
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'vote':
        include "../views/vote.php";
        break;
    case 'results':
        include "../views/results.php";
        break;
    default:
        include "../views/index.php";
}
?>
