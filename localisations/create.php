<?php
require "../db.php";

$poissons = $pdo->query("SELECT * FROM poissons")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $pos_x = $_POST["pos_x"];
    $pos_y = $_POST["pos_y"];
    $poisson_id = $_POST["poisson_id"];

    $pdo->prepare("
        INSERT INTO localisations (nom, pos_x, pos_y, poisson_id)
        VALUES (?, ?, ?, ?)
    ")->execute([$nom, $pos_x, $pos_y, $poisson_id]);

    header("Location: list.php");
    exit;
}
?>

<h1>Ajouter une localisation</h1>

<form method="post">

Nom : <input type="text" name="nom"><br>
X : <input type="number" name="pos_x"><br>
Y : <input type="number" name="pos_y"><br>

Poisson :
<select name="poisson_id">
    <?php foreach($poissons as $p): ?>
        <option value="<?= $p['id'] ?>"><?= $p['nom'] ?></option>
    <?php endforeach; ?>
</select><br>

<button type="submit">Ajouter</button>
</form>
