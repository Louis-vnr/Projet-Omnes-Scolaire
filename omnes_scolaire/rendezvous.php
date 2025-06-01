<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rendez-vous</title>
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
        <a class="current" href="rendezvous.php">Rendez-vous</a>
        <a href="compte.php">Votre Compte</a>
    </nav>

    <main>
        <h2>Mes rendez-vous</h2>
<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $sql = "SELECT id_prof,jour,heure FROM rdv WHERE id_client = '{$_SESSION['id']}' AND dispo = 0";
    $recherche = mysqli_query($db_handle,$sql);
    echo "<div class= 'resultats-container'>";
    while($resultats = mysqli_fetch_assoc($recherche)){
        $sql = "SELECT nom,prenom FROM personnel WHERE id = '{$resultats['id_prof']}'";
        $check = mysqli_query($db_handle,$sql);
        $prof = mysqli_fetch_assoc($check);
        echo "
        <div class = 'resultats'>
            <p>Rendez vous avec {$prof['nom']} {$prof['prenom']} le {$resultats['jour']} à {$resultats['heure']}</p>
            <form action='annuler_rdv.php' method='post'>
                <input type='hidden' name='id_prof' value='{$resultats['id_prof']}'>
                <input type='hidden' name='heure' value='{$resultats['heure']}'>
                <input type='hidden' name='jour' value='{$resultats['jour']}'>
                <div class ='choix-container'>
                    <input type='submit' class='choix' style='height : 70px;' name='action' value='Annuler RDV'>
                </div>
            </form>     
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
