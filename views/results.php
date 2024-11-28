<?php include "layout/header.php"; ?>

<h2>Voting Results</h2>

<?php
// Fetch results and categorize votes
$results = $voteModel->getResults();
$categories = [
    'Makes Work Fun' => [],
    'Team Player' => [],
    'Culture Champion' => [],
    'Difference Maker' => []
];

while ($result = $results->fetch(PDO::FETCH_ASSOC)) {
    $categories[$result['category']][] = $result;
}

// Display results for each category
foreach ($categories as $category => $votes) {
    echo "<h3>$category</h3>";
    if (!empty($votes)) {
        echo "<ul>";
        foreach ($votes as $vote) {
            echo "<li><strong>{$vote['nominee_name']}</strong> - {$vote['votes']} votes 
                  <br><strong>Comment:</strong> {$vote['comment']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No votes yet for this category.</p>";
    }
}

// Identify the most active voter
$activeVoters = $voteModel->getActiveVoters(); // Assumes this method retrieves voter activity data
if ($activeVoters) {
    echo "<h3>Most Active Voter(s):</h3>";
    echo "<ul>";
    foreach ($activeVoters as $voter) {
        echo "<li><strong>{$voter['voter_name']}</strong> - {$voter['vote_count']} votes cast</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No voting activity yet.</p>";
}
?>

<?php include "layout/footer.php"; ?>
