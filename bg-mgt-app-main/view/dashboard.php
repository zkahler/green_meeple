<?php  
$activePage = 'dashboard';
include 'header.php'; 
include 'nav.php'; 

usort($games, function($a, $b) {
    return strcasecmp($a['name'], $b['name']);
});
?>

<main>
    <section class="dashboard-container">
        <?php include 'filter-search.php'; ?>
        <h2>Available Board Games</h2>

        <?php if (empty($games)) : ?>
            <p class="empty-message">No board games found in the catalog.</p>
        <?php else: ?>
            <table>
                <thead>
    <thead>
    <tr>
        <th>Title</th>
        <th>Add to Cart</th>
        <th>Delete</th>
        <th>Details</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($games as $game): ?>
    <tr>
        <td class="board-game-item" data-name="<?= $game['name'] ?>">
            <?= htmlspecialchars($game['name']) ?>
        </td>
        <td>
            <form action="index.php?action=add_to_cart&id=<?= $game['id'] ?>" method="post" style="display:flex; align-items:center; gap:4px;">
                <input 
                    type="number" 
                    name="quantity" 
                    min="1" 
                    value="1" 
                    required 
                    style="width: 60px; padding: 4px; font-size: 14px;"
                >
                <button type="submit" class="action-btn add">➕ Add</button>
            </form>
        </td>
        <td>
            <form action="index.php?action=delete&id=<?= $game['id'] ?>" method="post"<?= htmlspecialchars($game['name']) ?>?');">
                <button type="submit" class="action-btn delete" style="color: white;">🗑️ Delete</button>
            </form>
        </td>
        <td>
            <button class="desc-btn" 
                data-desc="<?= htmlspecialchars($game['description']) ?>" 
                onclick="showDescription(this.getAttribute('data-desc'), this)">
                📘 Details
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
            </table>
        <?php endif; ?>
    </section>

    <!-- Floating Description Pop-up -->
    <div id="descriptionPopup" style="display:none; position:absolute; background-color:#fff; border:1px solid #ccc; padding:10px; box-shadow:0 2px 8px rgba(0,0,0,0.3); max-width:300px; z-index:1000;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDescription()" style="cursor:pointer;">❌</span>
            <p id="descriptionText"></p>
        </div>
    </div>
</main>

<script>
function showDescription(desc, button) {
    const popup = document.getElementById("descriptionPopup");
    const descText = document.getElementById("descriptionText");

    descText.textContent = desc;

    const rect = button.getBoundingClientRect();
    popup.style.top = `${rect.top + window.scrollY}px`;
    popup.style.left = `${rect.right + 10 + window.scrollX}px`;

    popup.style.display = "block";
}

// Optional: Hide on click outside
document.addEventListener("click", function(event) {
    const popup = document.getElementById("descriptionPopup");
    if (!popup.contains(event.target) && !event.target.classList.contains("desc-btn")) {
        popup.style.display = "none";
    }
});

function closeDescription() {
    document.getElementById("descriptionPopup").style.display = "none";
}
</script>

<?php include 'footer.php'; ?>