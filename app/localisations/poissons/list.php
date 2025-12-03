<?php
require '../db.php';

// Récupération des poissons
$req = $pdo->query("SELECT * FROM poissons");
$poissons = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des poissons</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="section">
    <h1>Liste des poissons</h1>

    <!-- Bouton ajouter -->
    <a class="btn btn-add" href="create.php">➕ Ajouter un poisson</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>

        <?php foreach($poissons as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nom']) ?></td>
            <td>
                <a class="btn btn-edit" href="update.php?id=<?= $p['id'] ?>">✏️ Modifier</a>
                <a class="btn btn-delete" href="delete.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('Supprimer ce poisson ?');">
                   ❌ Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

</body>
</html>
