<?php
$activePage = 'register';
include 'header.php';
include 'nav.php';
?>

<main>
    <section class="form-container">
        <form action="index.php?action=register" method="post" novalidate>
            <fieldset>
                <legend>🌱 Create Your Meeple Account</legend>

                <?php if (!empty($error)) : ?>
                    <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    pattern="[A-Za-z0-9_]{3,15}" 
                    title="3–15 letters, numbers, or underscores" 
                    required 
                    autofocus
                >

                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                >

                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                    title="Minimum 8 characters, including uppercase, lowercase, and a number"
                    required
                >

                <label for="password_confirm">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirm" 
                    name="password_confirm" 
                    required
                >

                <button type="submit">Join The Green Meeple</button>
            </fieldset>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>