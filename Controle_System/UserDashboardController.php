<?php 
session_start();
require_once './config.php';

if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) {
    echo "You are not logged in!";
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT user_name FROM users WHERE id = :user_id");
    $stmt->execute(['user_id' => $_SESSION['user_id']]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $username = htmlspecialchars($user['user_name']);
    } else {
        $username = "Guest";
    }
} catch (PDOException $e) {
    echo "Error fetching user information: " . $e->getMessage();
    exit;
}
?>
