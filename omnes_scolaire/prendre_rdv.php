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
<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $id = $_POST['id'];
    $sql = "SELECT jour,AM,PM"
}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>