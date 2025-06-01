<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>OMNES SCOLAIRE</h1>
    </header>

    <nav>
        <a href="index.html">Accueil</a>
        <a href="parcourir.html">Tout Parcourir</a>
        <a href="rechercher.php">Recherche</a>
        <a href="rendezvous.html">Rendez-vous</a>
        <a class="current" href="compte.php">Votre Compte</a>
    </nav>

    <main>
        <h2>Espace ADMIN</h2>
        <div class="choix-container">
            <a class="choix" href="liste_personnel_admin.php">Liste personnel</a>
            <form class="choix" action="inscription.php" method="POST">
                <input class="choix" type="submit" name="action" value="Créer compte enseignant">
            </form>
            <a class="choix" href="deconnexion.php">Se deconnecter</a>
        </div>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>