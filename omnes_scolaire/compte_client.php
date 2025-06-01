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
        <a href="rendezvous.php">Rendez-vous</a>
        <a class="current" href="compte.php">Votre Compte</a>
    </nav>
    <main>
        <?php
        session_start();
        echo"<h2>Bienvenue {$_SESSION['nom']} {$_SESSION['prenom']}</h2>"
        ?>
        <div class="choix-container">
            <a class="choix" href="deconnexion.php" >Se déconnecter</a>
        </div>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>