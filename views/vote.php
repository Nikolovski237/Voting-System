<?php include "layout/header.php"; ?>

<h2>Cast Your Vote</h2>
<form id="voteForm">
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
    <select name="category" id="category" required>
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
