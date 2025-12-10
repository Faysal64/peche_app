<?php
require 'db.php';

// charger les localisations existantes
$stmt = $pdo->query("SELECT * FROM localisations");
$localisations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte des poissons</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        body { margin:0; padding:0; font-family:Arial; }
        #map { height: 90vh; width: 100%; }

        .add-box {
            padding: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            margin: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<h2 style="text-align:center; margin-top:15px;">Associer un poisson à un lieu</h2>

<div id="map"></div>

<div class="add-box">
    <h3>Ajouter un point cliqué :</h3>
    <form action="localisations/save.php" method="POST">
        <input type="text" name="nom" placeholder="Nom de l'espèce" required>
        <input type="text" id="lat" name="lat" placeholder="Latitude" required>
        <input type="text" id="lng" name="lng" placeholder="Longitude" required>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<script>
    // création de la carte
    const map = L.map('map').setView([46.5, 2.5], 6);  // vue sur la France

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // Ajouter les lieux depuis la BDD
    <?php foreach ($localisations as $loc): ?>
        L.marker([<?= $loc['lat'] ?>, <?= $loc['lng'] ?>])
            .addTo(map)
            .bindPopup("<?= htmlspecialchars($loc['nom']) ?>");
    <?php endforeach; ?>

    // Click sur la carte = remplir le formulaire
    map.on("click", function(e) {
        document.getElementById("lat").value = e.latlng.lat;
        document.getElementById("lng").value = e.latlng.lng;
    });
</script>

</body>
</html>
