<?php
require "../db.php";

$id = $_GET["id"];

$poissons = $pdo->query("SELECT * FROM poissons")->fetchAll();

$req = $pdo->prepare("SELECT * FROM localisations WHERE id=?");
$req->execute([$id]);
$data = $req->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $pos_x = $_POST["pos_x"];
    $pos_y = $_POST["pos_y"];
    $poisson_id = $_POST["poisson_id"];

    $pdo->prepare("
        UPDATE localisations 
        SET nom=?, pos_x=?, pos_y=?, poisson_id=?
        WHERE id=?
    ")->execute([$nom, $pos_x, $pos_y, $poisson_id, $id]);

    header("Location: list.php");
    exit;
}
?>

<h1>Modifier une localisation</h1>

<form method="post">

Nom : <input type="text" name="nom" value="<?= $data['nom'] ?>"><br>
X : <input type="number" name="pos_x" value="<?= $data['pos_x'] ?>"><br>
Y : <input type="number" name="pos_y" value="<?= $data['pos_y'] ?>"><br>

Poisson :
<select name="poisson_id">
    <?php foreach($poissons as $p): ?>
        <option value="<?= $p['id'] ?>" 
            <?= $data['poisson_id'] == $p['id'] ? "selected" : "" ?>>
            <?= $p['nom'] ?>
        </option>
    <?php endforeach; ?>
</select><br>

<button type="submit">Modifier</button>
</form>
