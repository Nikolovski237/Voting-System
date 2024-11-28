<?php include "layout/header.php"; ?>

<h2 class="text-center mb-4">Voting Results</h2>

<?php
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

echo '<div class="container">';
foreach ($categories as $category => $votes) {
    echo "<h3 class='text-primary'>$category</h3>";
    if (!empty($votes)) {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Nominee</th><th>Votes</th><th>Comment</th></tr></thead>";
        echo "<tbody>";
        foreach ($votes as $vote) {
            echo "<tr>
                <td><strong>{$vote['nominee_name']}</strong></td>
                <td><span class='badge bg-success'>{$vote['votes']}</span></td>
                <td>{$vote['comment']}</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-muted'>No votes yet for this category.</p>";
    }
}

$activeVoters = $voteModel->getActiveVoters();
if ($activeVoters) {
    echo "<h3 class='text-primary mt-5'>Most Active Voter(s)</h3>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Voter Name</th><th>Votes Cast</th></tr></thead>";
    echo "<tbody>";
    foreach ($activeVoters as $voter) {
        echo "<tr>
            <td>{$voter['voter_name']}</td>
            <td><span class='badge bg-info'>{$voter['vote_count']}</span></td>
        </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p class='text-muted'>No voting activity yet.</p>";
}
echo '</div>';

?>

<?php include "layout/footer.php"; ?>
