<?php
session_start();

if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    if($type == 'client'){
        echo '<script>window.location.href = "compte_client.php";</script>';
        exit;
    }
    if($type == 'personnel'){
        echo '<script>window.location.href = "compte_personnel.php";</script>';
        exit;
    }
    if($type == 'admin'){
       echo '<script>window.location.href = "compte_admin.php";</script>';
       exit; 
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Compte</title>
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
        <h2>Votre Compte</h2>
        <p>Bienvenue ! Choisissez une action :</p>
        <div class="choix-container">
            <button class="choix" onclick="afficherOptionsClient()">Client</button>
            <form class="choix" action="connexion.php" method="POST">
                <input class="choix" type="submit" name="action" value="Admin">
            </form>
            <form class="choix" action="connexion.php" method="POST">
                <input class="choix" type="submit" name="action" value="Personnel">
            </form>
        </div>
        <div id="options_client" style="display: none;" class="choix-container">
            <form class="choix" action="connexion.php" method="POST">
                <input class="choix" type="submit" name="action" value="Se connecter">
            </form>
            <form class="choix" action="inscription.php" method="POST">
                <input class="choix" type="submit" name="action" value="S'inscrire">
            </form>
        </div>
    </main>

    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>

<script>
    function afficherOptionsClient(){
    document.getElementById("options_client").style.display = "flex";
    }
</script>

<?php
    
?>
