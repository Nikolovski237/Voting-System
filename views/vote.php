<?php include "layout/header.php"; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Cast Your Vote</h2>
    <form id="voteForm" method="POST">
        <div class="mb-3">
            <label for="voter" class="form-label">Your Name:</label>
            <select class="form-select" name="voter_id" id="voter" required>
                <option value="">Select your name</option>
                <?php
                $users = $userModel->getAllUsers();
                while ($user = $users->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominee" class="form-label">Nominee:</label>
            <select class="form-select" name="nominee_id" id="nominee" required>
                <option value="">Select a colleague</option>
                <?php
                $users = $userModel->getAllUsers();
                while ($user = $users->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select class="form-select" name="category_id" id="category" required>
                <option value="">Select a category</option>
                <option value="Makes Work Fun">Makes Work Fun</option>
                <option value="Team Player">Team Player</option>
                <option value="Culture Champion">Culture Champion</option>
                <option value="Difference Maker">Difference Maker</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea class="form-control" name="comment" id="comment" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Vote</button>
    </form>
    <div id="voteMessage" class="mt-3"></div>
</div>

<script>
    $("#voteForm").submit(function(e) {
        e.preventDefault();
        $.post("process_vote.php", $(this).serialize(), function(response) {
            const result = JSON.parse(response);
            $('#voteMessage').html(`<div class="alert alert-${result.success ? 'success' : 'danger'}">${result.message}</div>`);
            if (result.success) {
                setTimeout(() => location.reload(), 1000);
            }
        });
    });
</script>

<?php include "layout/footer.php"; ?>
