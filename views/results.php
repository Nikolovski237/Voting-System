<?php include "layout/header.php"; ?>

<h2>Voting Results</h2>

<?php
$results = $voteModel->getResults();
$categories = [
    'Makes Work Fun' => null,
    'Team Player' => null,
    'Culture Champion' => null,
    'Difference Maker' => null
];

while ($result = $results->fetch(PDO::FETCH_ASSOC)) {
    $categories[$result['category']][] = $result;
}

foreach ($categories as $category => $votes) :
    echo "<h3>$category</h3>";
    if ($votes) {
        echo "<ul>";
        foreach ($votes as $vote) {
            echo "<li>Nominee ID {$vote['nominee_id']} - {$vote['votes']} votes</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No votes yet for this category.</p>";
    }
endforeach;
?>

<?php include "layout/footer.php"; ?>
