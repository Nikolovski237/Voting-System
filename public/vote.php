<?php
include_once '../src/config.php';

$database = new Database();
$conn = $database->connect();

// Fetch employee and category data
$employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : 0;
$stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");
$stmt->bindParam(':id', $employee_id);
$stmt->execute();
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for Employee</title>
    <link rel="stylesheet" href="styles.css">
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
    <h1>Vote for <?php echo htmlspecialchars($employee['name']); ?></h1>
</header>

<div class="container">
    <h2>Select a Category and Provide a Comment</h2>

    <form action="submit_vote.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['name']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="comment">Your Comment:</label>
        <textarea name="comment" id="comment" rows="4" required></textarea>

        <button type="submit">Submit Vote</button>
    </form>
</div>

<footer>
    <p>&copy; 2024 Employee Voting System. All rights reserved.</p>
</footer>

</body>
</html>
