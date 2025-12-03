<?php
require "../db.php";

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM localisations WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: list.php");
exit;
