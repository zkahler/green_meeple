<?php 
$activePage = 'edit';
include 'header.php'; 
?>

<main>
    <section class="form-container">
        <h2>Edit Board Game</h2>

        <form method="post">
            <fieldset>
                <legend>Update Game</legend>

                <label for="name">Game Title</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($game['name']) ?>" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"><?= htmlspecialchars($game['description']) ?></textarea>

                <label for="price">Price (USD)</label>
                <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($game['price']) ?>" required>

                <button type="submit">Update Game</button>
            </fieldset>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>