<head>
<title>Omnes Scolaire</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>OMNES SCOLAIRE</h1>
    </header>

    <nav>
        <a href="index.html">Accueil</a>
        <a href="parcourir.html">Tout Parcourir</a>
        <a class="current" href="rechercher.php">Recherche</a>
        <a href="rendezvous.php">Rendez-vous</a>
        <a href="compte.php">Votre Compte</a>
    </nav>
    <main>
<?php
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $recherche_user = $_POST['recherche'] ?? '';
    $action = $_POST['action'] ?? '';
    if($action== 'Rechercher'){
        if($recherche_user == ''){
            $sql = "SELECT * FROM personnel";
        }
        else{
            $sql = "SELECT * FROM personnel WHERE departement LIKE '{$recherche_user}' OR prenom LIKE '{$recherche_user}' OR nom LIKE '{$recherche_user}' OR profession LIKE '{$recherche_user}'";
        }
        $recherche = mysqli_query($db_handle,$sql);
        if(mysqli_num_rows($recherche) == 0){
            echo "<h2>Aucun personnel trouvé</h2>";
        }
        else {
            echo "<div class='resultats-container'>";
            while ($resultats = mysqli_fetch_assoc($recherche)){
            echo "
            <div class='resultats'>
                <h3>{$resultats['nom']} {$resultats['prenom']}</h3>
                <img src='{$resultats['photo']}'>
                <p>{$resultats['profession']}</p>
                <p>Département de {$resultats['departement']}</p>
                <p><a href='mailto:{$resultats['courriel']}'>{$resultats['courriel']}</a>  {$resultats['telephone']}</p>
            </div>
            ";
            }
            echo "</div>";
        }
    }
}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr | +33 1 23 45 67 89</p>
    </footer>
</body>