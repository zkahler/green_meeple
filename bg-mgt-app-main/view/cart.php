<?php 
$activePage = 'cart';
include 'header.php'; 
include 'nav.php';
?>

<main>
    <section class="cart-container">
        <h2>Your Board Game Cart</h2>

        <?php if (empty($_SESSION['cart13'])) : ?>
            <p class="empty-message">Your cart is empty. Add games from the dashboard to get rolling.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr><th>Game Title</th><th>Quantity</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart13'] as $index => $item): ?>
                        <tr>
                            <form action="index.php?action=update_cart_item" method="post">
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td>
                                    <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" min="1" required>
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                </td>
                                <td>
                                    <button type="submit" class="action-btn edit">✏️ Update</button>
                                    <a href="index.php?action=remove_cart_item&index=<?= $index ?>" class="action-btn delete">🗑️</a>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>
</main>

<?php include 'footer.php'; ?>