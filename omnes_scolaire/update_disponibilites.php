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
$id = $_POST['id'];
echo "
<form action= 'handle_disponibilites.php' method='POST'>
    <input type='hidden' name='id' value='{$id}'>
";
$jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
$moments = ['AM','PM'];
foreach($jours as $jour){
    foreach($moments as $moment){
        echo "<label>$jour $moment</label>";
        echo "<input type='checkbox' name='dispo[{$jour}][{$moment}]' value='1'><br>";
    }
}
echo "
<input type='submit' value='Enregistrer'>
</form>
";
?>
</main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>