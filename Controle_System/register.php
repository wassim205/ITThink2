<?php

session_start();
require_once './config.php';

$errors = [];
$success = false;

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $fullname = trim($_POST["name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if (empty($fullname)) {
        $errors['fullname'] = 'You need to fill your full name.';
    } elseif (strpos($fullname, ' ') === false) {
        $errors['fullname'] = 'Please Enter your full name.';
    }

    if (empty($username)) {
        $errors['username'] = 'You need to fill your username.';
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_name = ?");
        $stmt->execute([$username]);
        $usernameCount = $stmt->fetchColumn();

        if ($usernameCount > 0) {
            $errors['username'] = 'This username is already taken. Please choose another one.';
        }
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'You need to provide a valid email.';
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $emailCount = $stmt->fetchColumn();

        if ($emailCount > 0) {
            $errors['email'] = 'An account with this Email already exists. Please log in.';
        }
    }

    if (empty($password)) {
        $errors['password'] = 'You need to fill your password.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'The password should be at least 8 characters long.';
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password) || 
              !preg_match('/[0-9]/', $password) || 
              !preg_match('/[a-z]/', $password) || 
              !preg_match('/[A-Z]/', $password)) {
        $errors['password_special'] = 'The password must contain at least one special character, number, lowercase, and uppercase letter.';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (Full_Name, user_name, email, user_password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fullname, $username, $email, $hashedPassword]);

        $pdo->exec("UPDATE users SET Role = 'User'");
        $stmt = $pdo->query("SELECT id FROM users ORDER BY id ASC LIMIT 5");
        $admins = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (!empty($admins)) {
            $placeholders = rtrim(str_repeat('?,', count($admins)), ',');
            $updateStmt = $pdo->prepare("UPDATE users SET Role = 'Admin' WHERE id IN ($placeholders)");
            $updateStmt->execute($admins);
        }

        header("Location: Login.php");
        exit;
    }
}

?>
