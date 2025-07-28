<?php
$dsn = 'mysql:host=localhost;dbname=board_games_db;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);

    // 🔥 Turn on error mode to catch and report issues
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: use associative array mode for cleaner results
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Optional: persistent connections (improves local dev speed)
    // $db->setAttribute(PDO::ATTR_PERSISTENT, true);

} catch (PDOException $e) {
    error_log("❌ Connection failed: " . $e->getMessage());
    die('Database connection failed.');
}
?>