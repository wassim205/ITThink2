<?php 
session_start();
require_once './config.php';

$stmt = $pdo->query("SELECT Count(*) as total_users FROM users");
$user_count = $stmt->fetch()["total_users"];


$stmt = $pdo->query("SELECT Count(*) as total_projects FROM projets");
$projects_Published = $stmt->fetch()["total_projects"];



$stmt = $pdo->query("SELECT Count(*) as freelancers FROM freelances");
$total_freelancers = $stmt->fetch()["freelancers"];


$stmt = $pdo->query("SELECT Count(*) as pended_offers FROM offres");
$pending_offers = $stmt->fetch()["pended_offers"];

?>