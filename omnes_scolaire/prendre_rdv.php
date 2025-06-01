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
if($_SESSION['type'] != 'client'){
    echo '<script>window.location.href = "enseignement.php";</script>';
    exit; 
}
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $id = $_POST['id'];
    $sql = "SELECT jour,AM,PM FROM disponibilites WHERE (AM = 1 OR PM = 1) AND id_prof = '$id'";
    $recherche = mysqli_query($db_handle,$sql);
    echo "<table>";
    echo "<tr>";
    while($resultats = mysqli_fetch_assoc($recherche)){
        echo"<th style = 'background-color : orange;'>{$resultats['jour']}</th>";
        if($resultats['AM'] == 1){
            $heures = ['8:00','9:00','10:00','11:00'];
            foreach($heures as $heure){
                $sql = "SELECT dispo FROM rdv WHERE id_prof = '{$id}' AND jour = '{$resultats['jour']}' AND heure = '{$heure}'";
                $check = mysqli_query($db_handle,$sql);
                $resultat = mysqli_fetch_assoc($check);
                if($resultat['dispo'] == 1){
                    echo "
                    <td>
                        <form action='handle_rdv.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='jour' value='{$resultats['jour']}'>
                            <input type='hidden' name='heure' value='$heure'>
                            <input type='submit' style = 'background-color : cyan;' value ='{$heure}'>
                        </form>
                    </td>
                    ";   
                }
                else{
                    echo"<td style = 'background-color : black;'>$heure</td>";
                }
            } 
        }
        if($resultats['PM'] == 1){
            $heures = ['14:00','15:00','16:00','17:00'];
            foreach($heures as $heure){
                $sql = "SELECT dispo FROM rdv WHERE id_prof = '{$id}' AND jour = '{$resultats['jour']}' AND heure = '{$heure}'";
                $check = mysqli_query($db_handle,$sql);
                $resultat = mysqli_fetch_assoc($check);
                if($resultat['dispo'] == 1){
                    echo "
                    <td>
                        <form action='handle_rdv.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='jour' value='{$resultats['jour']}'>
                            <input type='hidden' name='heure' value='$heure'>
                            <input type='submit' style = 'background-color : cyan;' value ='{$heure}'>
                        </form>
                    </td>
                    ";   
                }
                else{
                    echo"<td style = 'background-color : black;'>$heure</td>";
                }
            } 
        }
    }
    echo "</table>";
}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>