<?php
require "../db.php";
$rows = $pdo->query("SELECT * FROM localisations ORDER BY id DESC")->fetchAll();
?>

<h2>Liste des Localisations</h2>

<a href="../map.php">← Retour à la carte</a>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Actions</th>
</tr>

<?php foreach ($rows as $loc): ?>
<tr>
    <td><?= $loc['id'] ?></td>
    <td><?= htmlspecialchars($loc['nom']) ?></td>
    <td><?= $loc['lat'] ?></td>
    <td><?= $loc['lng'] ?></td>
    <td>
        <a href="update.php?id=<?= $loc['id'] ?>">✏ Modifier</a>
        |
        <a href="delete.php?id=<?= $loc['id'] ?>" onclick="return confirm('Supprimer ?')">🗑 Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
