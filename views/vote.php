<?php include "layout/header.php"; ?>

<h2>Cast Your Vote</h2>
<form id="voteForm" method="POST">
    <label for="voter">Your Name:</label>
    <select name="voter_id" id="voter" required>
        <option value="">Select your name</option>
        <?php
        $users = $userModel->getAllUsers();
        while ($user = $users->fetch(PDO::FETCH_ASSOC)) :
        ?>
            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
        <?php endwhile; ?>
    </select>

    <label for="nominee">Nominee:</label>
    <select name="nominee_id" id="nominee" required>
        <option value="">Select a colleague</option>
        <?php
        $users = $userModel->getAllUsers();
        while ($user = $users->fetch(PDO::FETCH_ASSOC)) :
        ?>
            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
        <?php endwhile; ?>
    </select>

    <label for="category">Category:</label>
    <select name="category_id" id="category" required>
        <option value="">Select a category</option>
        <option value="Makes Work Fun">Makes Work Fun</option>
        <option value="Team Player">Team Player</option>
        <option value="Culture Champion">Culture Champion</option>
        <option value="Difference Maker">Difference Maker</option>
    </select>

    <label for="comment">Comment:</label>
    <textarea name="comment" id="comment" required></textarea>

    <button type="submit">Submit Vote</button>
</form>

<div id="voteMessage"></div>

<?php include "layout/footer.php"; ?>

<script>
    $(document).ready(function() {
        $("#voteForm").submit(function(e) {
            e.preventDefault();  // Prevent normal form submission
            
            // Get form data
            var formData = $(this).serialize();

            // Send form data via AJAX to process_vote.php
            $.ajax({
                type: "POST",
                url: "process_vote.php",
                data: formData,
                success: function(response) {
                    // Assuming response is a JSON object with 'success' and 'message'
                    var result = JSON.parse(response);
                    $('#voteMessage').html(result.message); // Show message on page
                    if (result.success) {
                        // Optionally, redirect after a successful vote
                        setTimeout(function() {
                            window.location.href = 'index.php';  // Replace with your home page URL
                        }, 500); // Redirect after 0.5 seconds
                    }
                },
                error: function() {
                    $('#voteMessage').html("An error occurred while submitting your vote.");
                }
            });
        });
    });
</script>