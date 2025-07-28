<?php
require_once './db.php';

class BoardGame {
    // --- Board Game CRUD ---
    public function getAllGames() {
        global $db;
        $query = 'SELECT * FROM board_games';
        return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGame($name, $description, $price) {
        global $db;
        $stmt = $db->prepare('INSERT INTO board_games (name, description, price) VALUES (?, ?, ?)');
        $stmt->execute([$name, $description, $price]);
    }

    public function getGameById($id) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM board_games WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGame($id, $name, $description, $price) {
        global $db;
        $stmt = $db->prepare('UPDATE board_games SET name = ?, description = ?, price = ? WHERE id = ?');
        $stmt->execute([$name, $description, $price, $id]);
    }

    public function deleteGame($id) {
        global $db;
        $stmt = $db->prepare('DELETE FROM board_games WHERE id = ?');
        $stmt->execute([$id]);
    }

    // --- User Methods ---
    public function findUser($username, $password) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify(trim($password), $user['password'])) {
            return $user;
        }
        return null;
    }

    public function getUserByUsername($username) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($username, $email, $passwordHash) {
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            $success = $stmt->execute([$username, $email, $passwordHash]);

            if (!$success) {
                $errorInfo = $stmt->errorInfo();
                error_log("❌ Registration DB error: " . implode(' | ', $errorInfo));
            }
            return $success;
        } catch (PDOException $e) {
            error_log("❌ Exception during user insert: " . $e->getMessage());
            return false;
        }
    }

    public function userExists($username, $email) {
        global $db;

        // Check username separately
        $stmtUser = $db->prepare('SELECT id FROM users WHERE username = ?');
        $stmtUser->execute([$username]);
        $userExists = $stmtUser->fetch(PDO::FETCH_ASSOC);

        // Check email separately
        $stmtEmail = $db->prepare('SELECT id FROM users WHERE email = ?');
        $stmtEmail->execute([$email]);
        $emailExists = $stmtEmail->fetch(PDO::FETCH_ASSOC);

        error_log("🔍 userExists check — Username: " . ($userExists ? "Exists" : "Not found") .
                  " | Email: " . ($emailExists ? "Exists" : "Not found"));

        return ($userExists !== false || $emailExists !== false);
    }

    // --- Cart Methods ---
    public function getUserCart($userId) {
        global $db;
        $stmt = $db->prepare("SELECT item_name, quantity FROM cart_items WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveCart($userId, $cart) {
        global $db;
        $db->prepare("DELETE FROM cart_items WHERE user_id = ?")->execute([$userId]);

        $stmt = $db->prepare("INSERT INTO cart_items (user_id, item_name, quantity) VALUES (?, ?, ?)");
        foreach ($cart as $item) {
            if (!empty($item['name']) && !empty($item['quantity'])) {
                $stmt->execute([$userId, $item['name'], $item['quantity']]);
            }
        }
    }
}