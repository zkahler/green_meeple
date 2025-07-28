<?php
function validateGameInput($name, $description, $price) {
    if (empty($name) || empty($price)) return "Game name and price are required.";
    if (!is_numeric($price) || $price <= 0) return "Price must be a positive number.";
    return "";
}
?>