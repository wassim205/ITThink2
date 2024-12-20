<?php

session_start();
require_once './config.php';

$errors = [];

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Login"])) {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please provide a valid email.';
    }

    if (empty($password)) {
        $errors['password'] = 'Please enter your password.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id, user_password, Role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['Role'];

            if ($user["Role"] === "Admin") {
               header("Location: Dashboard.php");
               } else {
                header("Location: userDashboard.php");
            }
            exit;
        } else {
            $errors['login'] = 'Incorrect email or password.';
        }
    }
}

?>