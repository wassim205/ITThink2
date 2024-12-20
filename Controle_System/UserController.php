<?php

session_start();
require_once './config.php';

$stmt = $pdo->query("SELECT Id, Full_Name, email FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>