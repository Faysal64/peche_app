<?php

$host = '127.0.0.1';   // important : éviter "localhost"
$db   = 'peche';
$user = 'root';
$pass = '';           // si tu es sur Ubuntu, root n’a pas de mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur connexion MySQL : " . $e->getMessage());
}
