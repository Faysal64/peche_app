<?php
require '../db.php';

if (!empty($_POST['nom'])) {
    $stmt = $pdo->prepare("INSERT INTO poissons (nom) VALUES (?)");
    $stmt->execute([$_POST['nom']]);

    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../style.css"></head>
<body>

<div class="container">
    <h1>Ajouter un poisson</h1>

    <form method="post">
        <label>Nom du poisson :</label>
        <input type="text" name="nom" required>

        <input type="submit" value="Ajouter">
    </form>
</div>

</body>
</html>
