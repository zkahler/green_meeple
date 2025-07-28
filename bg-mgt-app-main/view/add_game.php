<?php
$activePage = 'add';
include 'header.php';
include 'nav.php';
?>
<main>
    <section class="form-container">
        <h2>Add a New Board Game</h2>

        <?php if (!empty($error)) : ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <fieldset>
                <legend>Game Details</legend>

                <label for="name">Game Title</label>
                <input type="text" id="name" name="name" placeholder="e.g. Codenames" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Brief summary or game genre..." rows="4"></textarea>

                <label for="price">Price (USD)</label>
                <input type="number" id="price" name="price" step="0.01" placeholder="e.g. 29.99" required>

                <button type="submit">Add Game</button>
            </fieldset>
        </form>
    </section>
</main>
<?php include 'footer.php'; ?>