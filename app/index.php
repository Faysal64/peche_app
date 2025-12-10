
<?php require "db.php"; ?>

<?php // index.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Application de pêche</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- HERO AVEC FOND CARTE -->
<div class="hero">
    <div class="hero-text">
        <h1>FISH POKEDEX</h1>
        <p>Découvrez quels poissons vivent dans quels cours d’eau, partout dans le monde</p>
    </div>
</div>


<!-- SECTION 1 -->
<div class="section">
    <h2>À quoi sert cette application ?</h2>

    <div class="section-content">
        <img src="https://images.unsplash.com/photo-1508184964240-ee0eacfd3f5b?auto=format&fit=crop&w=900&q=80" alt="Pêcheur">

        <div class="text">
            <p>
                Cette application permet aux pêcheurs, biologistes et gestionnaires d’écosystèmes
                d'identifier quels <strong>poissons</strong> vivent dans quels <strong>cours d’eau</strong>
                selon les régions du monde.
            </p>

            <h3>Fonctionnalités CRUD disponibles :</h3>

            <!-- CRUD CARDS -->
            <div class="crud-grid">

                <a class="crud-card" href="poissons/create.php">
                    <div class="icon">➕</div>
                    <h3>Ajouter un poisson</h3>
                    <p>Ajouter une nouvelle espèce dans la base de données.</p>
                </a>

                <a class="crud-card" href="poissons/list.php">
                    <div class="icon">✏️</div>
                    <h3>Modifier un poisson</h3>
                    <p>Mettre à jour les espèces existantes.</p>
                </a>

                <a class="crud-card" href="poissons/list.php">
                    <div class="icon">🗑</div>
                    <h3>Supprimer un poisson</h3>
                    <p>Retirer une espèce d’un cours d’eau.</p>
                </a>

                <!-- 🌍 OUVERTURE DE LA CARTE -->
                <a class="crud-card" href="map.php">
                    <div class="icon">🌍</div>
                    <h3>Associer un poisson</h3>
                    <p>Lier une espèce à une localisation / région sur la carte.</p>
                </a>

            </div>
        </div>
    </div>
</div>


<!-- SECTION 2 -->
<div class="section">
    <h2>Gestion principale</h2>

    <div class="menu">
        <a class="btn" href="poissons/list.php">🐟 Gestion des poissons</a>
        <a class="btn" href="localisations/list.php">📍 Gestion des localisations</a>
    </div>
</div>


<!-- FOOTER -->
<footer>
    © 2024 Application de pêche — Réalisée par Faysal
</footer>

</body>
</html>

	
