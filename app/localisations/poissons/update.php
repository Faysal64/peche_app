<?php
require '../db.php';

$id = $_GET['id'];
$poisson = $pdo->query("SELECT * FROM poissons WHERE id = $id")->fetch();

if (!empty($_POST['nom'])) {
    $stmt = $pdo->prepare("UPDATE poissons SET nom=? WHERE id=?");
    $stmt->execute([$_POST['nom'], $id]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../style.css"></head>
<body>

<div class="container">
    <h1>Modifier le poisson</h1>

    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $poisson['nom'] ?>" required>

        <input type="submit" value="Modifier">
    </form>
</div>

</body>
</html>
