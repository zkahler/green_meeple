CREATE DATABASE IF NOT EXISTS board_games_db;
USE board_games_db;

CREATE TABLE IF NOT EXISTS board_games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

-- Get all board games
SELECT * FROM board_games;

-- Add a board game
INSERT INTO board_games (name, description, price) VALUES (?, ?, ?);

-- Get board game by ID
SELECT * FROM board_games WHERE id = ?;

-- Update board game
UPDATE board_games SET name = ?, description = ?, price = ? WHERE id = ?;

-- Delete board game
DELETE FROM board_games WHERE id = ?;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Login: find user by username
SELECT * FROM users WHERE username = ?;

-- Registration: check if username or email already exists
SELECT id FROM users WHERE username = ? OR email = ?;

-- Register a new user
INSERT INTO users (username, email, password) VALUES (?, ?, ?);

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Get saved cart for user
SELECT item_name, quantity FROM cart_items WHERE user_id = ?;

-- Clear existing cart for user
DELETE FROM cart_items WHERE user_id = ?;

-- Save each item in user's cart
INSERT INTO cart_items (user_id, item_name, quantity) VALUES (?, ?, ?);