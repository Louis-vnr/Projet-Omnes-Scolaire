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
        <a class="current" href="parcourir.html">Tout Parcourir</a>
        <a href="rechercher.php">Recherche</a>
        <a href="rendezvous.php">Rendez-vous</a>
        <a href="compte.php">Votre Compte</a>
    </nav>

    <main>
<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
$moments = ['AM','PM'];
if ($db_found){
    $sql = "SELECT id,nom,prenom,departement,profession,photo FROM personnel";
    $recherche = mysqli_query($db_handle,$sql);
    echo "<div class='resultats-container'>";
    while($resultats = mysqli_fetch_assoc($recherche)){
        echo "
        <div class='resultats'>
            <img src='{$resultats['photo']}'>
            <p>{$resultats['nom']} {$resultats['prenom']}</p>
            <p>Département de {$resultats['departement']}</p>
            <p>{$resultats['profession']}</p>
        ";
        $sql = "SELECT * FROM disponibilites WHERE id_prof = '{$resultats['id']}'";
        $check_dispo = mysqli_query($db_handle,$sql);
        if(mysqli_num_rows($check_dispo) != 0){
            echo"
            <table border = '1'>
                <tr>
                    <th colspan='2'>Lundi</th>
                    <th colspan='2'>Mardi</th>
                    <th colspan='2'>Mercredi</th>
                    <th colspan='2'>Jeudi</th>
                    <th colspan='2'>Vendredi</th>
                </tr>
                <tr>
                    <th >AM</th>
                    <th >PM</th>
                    <th>AM</th>
                    <th>PM</th>
                    <th>AM</th>
                    <th>PM</th>
                    <th>AM</th>
                    <th>PM</th>
                    <th>AM</th>
                    <th>PM</th>
                </tr>
                <tr>
            ";
            foreach($jours as $jour){
                foreach($moments as $moment){
                    $sql="SELECT {$moment} FROM disponibilites WHERE id_prof='{$resultats['id']}' AND jour = '{$jour}'";
                    $check = mysqli_query($db_handle,$sql);
                    $resultat = mysqli_fetch_assoc($check);
                    if($resultat[$moment] == 0){
                        echo "<th style = 'background-color : black; height : 20px'></th>";
                    }
                    else{
                        echo "<th style = 'height : 20px'></th>";
                    }
                }
            }
            echo "</tr>";
            echo "</table>";
            echo "
                <div class='choix-container'>
                    <form action='prendre_rdv.php' method='POST'>
                        <input type='hidden' name='id' value='{$resultats['id']}'>
                        <button class='choix' style ='height : 50px;' type='submit'>Prendre RDV</button>
                    </form>
                </div>
            </div>
            ";
        }
    }
    echo "</div>";

}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>