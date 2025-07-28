<div id="alphaFilter">
  <span onclick="filterByLetter('all')">All</span>
<span onclick="filterByLetter('#')">#</span>
<?php foreach (range('A', 'Z') as $char): ?>
  <span onclick="filterByLetter('<?= $char ?>')"><?= $char ?></span>
<?php endforeach; ?>
</div>



<script>
function filterByLetter(letter) {
  const rows = document.querySelectorAll("tbody tr");
  const letters = document.querySelectorAll("#alphaFilter span");

  rows.forEach(row => {
    const itemCell = row.querySelector(".board-game-item");
    const name = itemCell?.textContent?.trim().toUpperCase();
    row.style.display = (letter === 'all' || name.startsWith(letter)) ? "" : "none";
  });

  letters.forEach(el => el.classList.remove("active"));
  const target = Array.from(letters).find(el => el.textContent.toUpperCase() === letter.toUpperCase());
  if (target) target.classList.add("active");
}

function filterByLetter(letter) {
  const rows = document.querySelectorAll("tbody tr");
  const letters = document.querySelectorAll("#alphaFilter span");

  rows.forEach(row => {
    const itemCell = row.querySelector(".board-game-item");
    const name = itemCell?.textContent?.trim().toUpperCase();

    if (letter === 'all') {
      row.style.display = "";
    } else if (letter === '#') {
      // Show rows where name starts with a number
      row.style.display = /^[0-9]/.test(name) ? "" : "none";
    } else {
      row.style.display = name.startsWith(letter) ? "" : "none";
    }
  });

  letters.forEach(el => el.classList.remove("active"));
  const target = Array.from(letters).find(el => el.textContent.toUpperCase() === letter.toUpperCase());
  if (target) target.classList.add("active");
}
</script>