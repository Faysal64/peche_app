<?php
require '../db.php';

$id = $_GET['id'];

$pdo->prepare("DELETE FROM poissons WHERE id=?")->execute([$id]);

header("Location: list.php");
exit;
