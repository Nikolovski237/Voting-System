<?php
include_once '../src/config.php';  // Include the database configuration

$database = new Database();
$conn = $database->connect();

// Fetch all employees to display them on the homepage
$stmt = $conn->prepare("SELECT * FROM employees");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all categories
$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Voting System</title>
    <link rel="stylesheet" href="styles.css">  <!-- External CSS file -->
</head>
<body>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="results.php">Results</a></li>
    </ul>
</nav>

<header>
    <h1>Welcome to the Employee Voting System</h1>
</header>

<div class="container">
    <h2>Vote for your colleagues in the following categories:</h2>

    <!-- Displaying Employees -->
    <div class="employee-list">
        <?php foreach ($employees as $employee): ?>
            <div class="employee">
                <h2><?php echo htmlspecialchars($employee['name']); ?></h2>
                <p>Choose a category and submit a comment to vote for this employee.</p>
                <a href="vote.php?employee_id=<?php echo $employee['id']; ?>" class="btn">
                    <button>Vote for <?php echo $employee['name']; ?></button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Employee Voting System. All rights reserved.</p>
</footer>

</body>
</html>
