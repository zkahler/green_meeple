<?php
$activePage = 'login';
include 'header.php';
include 'nav.php';
?>

<main>
    <section class="form-container">
        <form action="index.php?action=login" method="post" novalidate>
            <fieldset>
                <legend>🧠 Meeple Login</legend>

                <?php if (!empty($error)) : ?>
                    <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    autofocus
                >

                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                    title="Minimum 8 characters with uppercase, lowercase, and a number"
                >

                <button type="submit">Enter The Green Meeple</button>
            </fieldset>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>