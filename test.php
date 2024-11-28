<?php
include_once 'src/config.php';

$database = new Database();
$conn = $database->connect();

if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Failed to connect to the database.";
}
?>
