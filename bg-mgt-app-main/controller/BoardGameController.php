<?php
session_start();
require_once './model/BoardGame.php';

class BoardGameController {
    private $model;

    public function __construct() {
        $this->model = new BoardGame();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'dashboard';

        switch ($action) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];

                    if ($name && $price) {
                        $this->model->addGame($name, $description, $price);
                        header('Location: index.php');
                        exit();
                    } else {
                        $error = 'Name and price required';
                        include './view/add_game.php';
                    }
                } else {
                    include './view/add_game.php';
                }
                break;

            case 'edit':
                $id = $_GET['id'];
                $game = $this->model->getGameById($id);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $this->model->updateGame($id, $name, $description, $price);
                    header('Location: index.php');
                    exit();
                } else {
                    include './view/edit_game.php';
                }
                break;

            case 'delete':
                $id = $_GET['id'];
                $this->model->deleteGame($id);
                header('Location: index.php');
                exit();
                break;

            case 'add_to_cart':
                $id = $_GET['id'] ?? null;
                if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    $item = $this->model->getGameById($id);
                    if ($item) {
                        if (!isset($_SESSION['cart13'])) {
                            $_SESSION['cart13'] = [];
                        }

                        $quantity = isset($_POST['quantity']) ? max(1, (int)$_POST['quantity']) : 1;

                        $found = false;
                        foreach ($_SESSION['cart13'] as &$cartItem) {
                            if ($cartItem['name'] === $item['name']) {
                                $cartItem['quantity'] += $quantity;
                                $found = true;
                                break;
                            }
                        }
                        unset($cartItem);

                        if (!$found) {
                            $_SESSION['cart13'][] = ['name' => $item['name'], 'quantity' => $quantity];
                        }
                    }
                }
                header('Location: index.php?action=cart');
                exit();
                break;

            case 'remove_cart_item':
                $index = $_GET['index'] ?? null;
                if ($index !== null && isset($_SESSION['cart13'][$index])) {
                    unset($_SESSION['cart13'][$index]);
                    $_SESSION['cart13'] = array_values($_SESSION['cart13']);
                }
                header('Location: index.php?action=cart');
                exit();
                break;

           case 'update_cart_item':
    $index = $_POST['index'] ?? null;
    $quantity = $_POST['quantity'] ?? null;
    if ($index !== null && $quantity && isset($_SESSION['cart13'][$index])) {
        $_SESSION['cart13'][$index]['quantity'] = max(1, (int)$quantity);
    }
    header('Location: index.php?action=cart');
    exit();
    break;

            case 'login':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'] ?? '';
                    $password = $_POST['password'] ?? '';

                    $user = $this->model->findUser($username, $password);
                    if ($user) {
                        $_SESSION['user'] = $user;
                        $cart = $this->model->getUserCart($user['id']);
                        $_SESSION['cart13'] = [];
                        foreach ($cart as $item) {
                            $_SESSION['cart13'][] = ['name' => $item['item_name'], 'quantity' => $item['quantity']];
                        }
                        header('Location: index.php');
                        exit();
                    } else {
                        $error = 'Invalid username or password';
                        include './view/login.php';
                    }
                } else {
                    include './view/login.php';
                }
                break;

            case 'logout':
                if (isset($_SESSION['user'])) {
                    $this->model->saveCart($_SESSION['user']['id'], $_SESSION['cart13'] ?? []);
                }
                session_destroy();
                header('Location: index.php');
                exit();
                break;

           case 'register':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate inputs
        $username = htmlspecialchars(trim($_POST['username']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);

        // Validate required fields
        if (!$username || !$email || !$password || !$password_confirm) {
            $error = 'All fields are required.';
            include './view/register.php';
            break;
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format.';
            include './view/register.php';
            break;
        }

        // Validate password strength
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $error = 'Password must be at least 8 characters long and include uppercase, lowercase, and a number.';
            include './view/register.php';
            break;
        }

        // Check for password mismatch
        if ($password !== $password_confirm) {
            error_log("Password mismatch: [$password] vs [$password_confirm]");
            $error = 'Passwords do not match.';
            include './view/register.php';
            break;
        }

        // Check for existing user
        if ($this->model->userExists($username, $email)) {
            $error = 'Username or email already taken.';
            include './view/register.php';
            break;
        }

        // Securely hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Add user to the database
        $added = $this->model->addUser($username, $email, $passwordHash);

        if ($added) {
            header('Location: index.php?action=login');
            exit();
        } else {
            error_log("DB insert failed for user [$username], email [$email]");
            $error = 'Registration failed. Please try again.';
            include './view/register.php';
        }
    } else {
        include './view/register.php';
    }
    break;
            case 'cart':
                include './view/cart.php';
                break;

            default:
                $games = $this->model->getAllGames();
                include './view/dashboard.php';
                break;
        }
    }
}