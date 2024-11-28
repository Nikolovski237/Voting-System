<?php
include_once 'config/database.php';

$db = (new Database())->getConnection();

if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Failed to connect to the database.";
}
?>
