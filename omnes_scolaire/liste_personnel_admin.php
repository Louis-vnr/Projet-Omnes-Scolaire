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
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $sql = "SELECT id,nom,prenom,departement,profession FROM personnel";
    $recherche = mysqli_query($db_handle,$sql);
    echo "<div class='resultats-container'>";
    while($resultats = mysqli_fetch_assoc($recherche)){
        echo "
        <div class='resultats'>
            <p>{$resultats['nom']} {$resultats['prenom']}</p>
            <p>Département de {$resultats['departement']}</p>
            <p>{$resultats['profession']}</p>
            <div class='choix-container'>
                <form action='supprimer_personnel.php' method='POST'>
                    <input type='hidden' name='id' value='{$resultats['id']}'>
                    <button class='choix' style ='height : 50px;' type='submit'>Supprimer</button>
                </form>
                <form action='update_disponibilites.php' method='POST'>
                    <input type='hidden' name='id' value='{$resultats['id']}'>
                    <button class='choix' style ='height : 50px;' type='submit'>Disponibilités</button>
                </form>
            </div>
        </div>
        ";
    }
    echo "</div>";

}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>
