<?php

$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'peche';
$user = getenv('DB_USER') ?: 'peche_user';
$pass = getenv('DB_PASSWORD') ?: 'peche_pwd';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion MySQL : " . $e->getMessage());
}
