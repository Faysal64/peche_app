<?php
require "../db.php";

if (!empty($_POST['nom']) && !empty($_POST['lat']) && !empty($_POST['lng'])) {

    $stmt = $pdo->prepare("
        INSERT INTO localisations (nom, lat, lng)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $_POST['nom'],
        $_POST['lat'],
        $_POST['lng']
    ]);

    header("Location: ../map.php");
    exit;
}

echo "Erreur : données manquantes !";
?>
