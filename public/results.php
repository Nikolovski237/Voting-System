<?php
include_once '../src/config.php';

$database = new Database();
$conn = $database->connect();

// Fetch all categories
$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch the vote counts for each category
$results = [];
foreach ($categories as $category) {
    $stmt = $conn->prepare("SELECT employee_id, COUNT(*) as vote_count FROM votes WHERE category = :category GROUP BY employee_id");
    $stmt->bindParam(':category', $category['name']);
    $stmt->execute();
    $results[$category['name']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="vote.php">Vote</a></li>
    </ul>
</nav>

<header>
    <h1>Voting Results</h1>
</header>

<div class="container">
    <h2>Results by Category</h2>

    <?php foreach ($results as $category => $votes): ?>
        <div class="category">
            <h3><?php echo htmlspecialchars($category); ?></h3>
            <ul>
                <?php foreach ($votes as $vote): ?>
                    <li>
                        <?php
                        // Get employee name
                        $stmt = $conn->prepare("SELECT name FROM employees WHERE id = :id");
                        $stmt->bindParam(':id', $vote['employee_id']);
                        $stmt->execute();
                        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <?php echo htmlspecialchars($employee['name']) . ' - Votes: ' . $vote['vote_count']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<footer>
    <p>&copy; 2024 Employee Voting System. All rights reserved.</p>
</footer>

</body>
</html>
